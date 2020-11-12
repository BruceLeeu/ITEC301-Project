<?php
/*
* Louis la Grange | SL2CQH2H6
* BSc IT 3A | ITEC301
*/

// Starts a new PHP session
session_start();

if (empty(session_id())) {
    session_start();
}

// Initialise DB connection
require_once "conn.php";
$ajaxOutput = '';

// Switch case that executes certain functions based on the POST query
if (isset($_POST["query"])) {
    switch ($_POST["query"]) {
        case "markPaid":
            if (isset($_POST["orderID"])) {
                $ajaxOutput = markOrderPaid($_POST["orderID"]);
            }
            break;
        case "markCollected":
            if (isset($_POST["orderID"])) {
                $ajaxOutput = markOrderCollected($_POST["orderID"]);
            }
            break;
        case "getAllOrders":
            if ($_SESSION["userType"] == 1) {
                $ajaxOutput = getAllOrdersAdmin();
            } else {
                $ajaxOutput = getAllOrders();
            }
            break;
        case "loadCakes":
            $ajaxOutput = getCakes();
            break;
        case "cakeInfo":
            if (isset($_POST["cakeID"])) {
                $ajaxOutput = getCakeInfo($_POST["cakeID"]);
            }
            break;
        case "addOrder":
            if (isset($_POST["cakeID"]) && isset($_POST["amount"])) {
                $ajaxOutput = addOrder($_POST["cakeID"], ($_POST["amount"]));
            }
            break;
        case "login":
            if (isset($_POST["usr"]) && isset($_POST["pwd"])) {
                $ajaxOutput = checkCredentials($_POST["usr"], $_POST["pwd"]);
            }
            break;
        case "register":
            if (isset($_POST["usr"]) && isset($_POST["pwd"]) && isset($_POST["name"])) {
                $ajaxOutput = registerNewUser($_POST["usr"], $_POST["pwd"], $_POST["name"]);
            }
            break;
        case "deleteOrder":
            if (isset($_POST["orderID"])) {
                $ajaxOutput = deleteOrder($_POST["orderID"]);
            }
            break;
        default:
            return;
    }
    // Return the output after executing the function from the POST query
    echo $ajaxOutput;
}

// This function generates the list of all cakes in the cakes DB table
function getCakes()
{
    $functOut = '';
    // Execute the SQL script to select all cakes and their info
    $result = $GLOBALS['dbcon']->query(
        "SELECT * FROM cakes 
        ORDER BY cakeID ASC;"
    );
    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {
            $functOut .= '
            <div class="section">
                <a href="cake-info.php?cakeID=' . $row['cakeID'] . '">
                    <div class="section-picture">
                        <img src="assets/images/' . strtolower(str_replace(" ", "-", $row['cakeName'])) . '.jpg">
                    </div>
                    <div class="section-title">
                        <span>
                            ' . $row['cakeName'] . '
                        </span>
                        <span>
                            R ' . $row['cakePrice'] . '
                        </span>
                    </div>
                </a>
            </div>
        ';
        }
        return $functOut;
    } else {
        return $functOut .= '<span>No results found :(</span>';
    }
}

// This function generates the cake information page for a specific cake
function getCakeInfo($cakeID)
{
    $functOut = '';
    // SQL query gets information for the selected cake
    $result = $GLOBALS['dbcon']->query(
        "SELECT * FROM cakes 
        WHERE cakeID='" . $cakeID . "'"
    );
    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {
            $functOut .= '
            <div class="section">
                <div class="description">
                    <span class="title">' . $row['cakeName'] . '</span>
                    <p class="text">' . $row['cakeDesc'] . '</p>
                    <span class="price"><a>Cake Price: R</a><a id="price">' . $row['cakePrice'] . '</a></span>
                </div>
                <div class="order-options">
                    <input type="number" id="amount" placeholder="amount of cakes" value="1" min="1" max="10" onchange="updateSum()">
                    <span class="error-msg" id="error-msg"></span>
                    <span class="total"><a>Total: R</a><a id="total">--</a></span>
                    <button onclick="addOrder()" class="btn-order">ORDER NOW!</button>
                </div>
            </div>
            <div class="cake-pic">
                <img src="assets/images/' . strtolower(str_replace(" ", "-", $row['cakeName'])) . '.jpg">
            </div>
        ';
        }
        return $functOut;
    } else {
        return $functOut .= '<span>No cakes with this ID exist :(</span>';
    }
}

// This function performs an SQL query to insert an order record to the orders table
function addOrder($cakeID, $amount)
{
    // DB connection stored in global variable executes the insert query, and returns resulting status
    if ($GLOBALS['dbcon']->query(
        "INSERT INTO orders (cakeID, userID, quantity) 
        VALUES 
        ('" . $cakeID . "', 
        (SELECT userID FROM users WHERE users.userEmail = '" . $_SESSION['userId'] . "'), 
        '" . $amount . "');"
    ) === TRUE) {
        return 'Success!';
    } else {
        return 'order could not be created: ' . $GLOBALS['dbcon']->error;
    }
}

// Validates a user based on their email and password combination
function checkCredentials($email, $pass)
{
    $functOut = '';
    // SQL query only selects a user with matching credentials
    $result = $GLOBALS['dbcon']->query(
        "SELECT * FROM users 
        WHERE users.userEmail='" . $email . "' 
        AND users.userPass='" . $pass . "'"
    );
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // If this user exists, start a new session variable
            // This is used to remember the user, until they log out
            $_SESSION['userId'] = $row['userEmail'];
            $_SESSION['userType'] = $row['admin'];
            $functOut = 'User Logged in Successfully!';
        }
        return $functOut;
    } else {
        $functOut = 'Username and password does not match :(';
        return $functOut;
    }
}

// Registers a new user with a password, name, and email address
function registerNewUser($email, $pwd, $name)
{
    // Checks to see if all fields are inserted correctly
    if ($email == '' || $pwd == '' || $name == '') {
        return 'Please fill out all of the fields!';
    } else {
        // SQL query checks if a user with same email already exists in the users table
        $result = $GLOBALS['dbcon']->query(
            "SELECT * FROM users 
            WHERE users.userEmail='" . $email . "'"
        );
        if ($result->num_rows > 0) {
            return 'An account for this email address exists. Please try logging in.';
        } else {
            // Finally, a record can be inserted with this SQL query
            if ($GLOBALS['dbcon']->query(
                "INSERT INTO users (userName, userEmail, userPass) 
                VALUES ('" . $name . "', '" . $email . "', '" . $pwd . "');"
            ) === TRUE) {
                // After creating user, start a new session variable (log in)
                // This is used to remember the user, until they log out
                $_SESSION['userId'] = $email;
                $_SESSION['userType'] = 0;
                return 'Account Created!';
            } else {
                return 'Account could not be created: ' . $GLOBALS['dbcon']->error;
            }
        }
    }
}

// This function gets all orders in the orders table (only admin can access it)
function getAllOrdersAdmin()
{
    $cakesTotal = 0;
    $cakesCollected = 0;
    $amountTotal = 0;
    $amountPaid = 0;
    $functOut = '
    <table>
    <thead>
        <tr>
            <th>
                ORDER NUMBER
            </th>
            <th>
                ORDER DATE
            </th>
            <th>
                CAKE NAME
            </th>
            <th>
                PICTURE
            </th>
            <th>
                QUANTITY
            </th>
            <th>
                TOTAL PRICE
            </th>
            <th>
                STATUS
            </th>
            <th>
                FOR
            </th>
            <th>
                ACTIONS
            </th>
        </tr>
    </thead>
    <tbody>';
    // SQL query will join the orders to the users who created it
    $result = $GLOBALS['dbcon']->query(
        "SELECT * FROM orders 
        INNER JOIN cakes ON cakes.cakeID = orders.cakeID 
        INNER JOIN users ON users.userID = orders.userID
        ORDER BY orders.orderDate DESC"
    );

    if ($result->num_rows > 0) {

        // Generate the list of orders
        while ($row = $result->fetch_assoc()) {
            $status = '';
            $cakesTotal = $row['quantity'] + $cakesTotal;
            $amountTotal = ($row['quantity'] * $row['cakePrice']) + $amountTotal;

            if ($row['paid'] == 1) {
                $amountPaid = ($row['quantity'] * $row['cakePrice']) + $amountPaid;
                if ($row['collected'] == 0) {
                    $status = 'Paid and Ready for Collection';
                } else if ($row['collected'] == 1) {
                    $status = 'Paid and Collected';
                    $cakesCollected = $row['quantity'] + $cakesCollected;
                }
            } else {
                $status = 'Payment Pending';
            }

            $functOut .= '
            <tr>
                <td>
                    OR' . $row['orderID'] . '
                </td>
                <td>
                    ' . $row['orderDate'] . '
                </td>
                <td>
                    ' . $row['cakeName'] . '
                </td>
                <td>
                    <img src="assets/images/' . strtolower(str_replace(" ", "-", $row['cakeName'])) . '.jpg">
                </td>
                <td>
                    ' . $row['quantity'] . '
                </td>
                <td>
                    R ' . ($row['quantity'] * $row['cakePrice']) . '
                </td>
                <td>
                    ' . $status . '
                </td>
                <td>
                    ' . $row['userName'] . ' (' . $row['userEmail'] . ')
                </td>
                <td>
                    <button class="paid"' . ($row['paid'] == 1 ? "disabled" : "") . ' name="paid" id="paid" onclick="markPaid(' . $row['orderID'] . ')">Mark Paid</button>
                    <button class="collected"' . ($row['collected'] == 1 ? "disabled" : "") . ' name="collected" id="collected" onclick="markCollected(' . $row['orderID'] . ')">Mark Collected</button>
                    <button class="deleteOrder" name="deleteOrder" id="deleteOrder" onclick="deleteOrder(' . $row['orderID'] . ')">Delete Order</button>
                </td>
            </tr>';
        }
        // Prepend statistics section to the output
        $functOut = '
        <div class="payment-details">
            <h1>Order Statistics</h1>
            <span><a>Amount Paid:</a> <a>R ' . $amountPaid . '</a></span>
            <span><a>Amount Outstanding:</a> <a>R ' . ($amountTotal - $amountPaid) . '</a></span>
            <span><a>Amount Total:</a> <a>R ' . $amountTotal . '</a></span>
            <span><a>Cakes Paid & Collected:</a> <a>' . $cakesCollected . '</a></span>
            <span><a>Cakes Ready for Collection:</a> <a>' . ($cakesTotal - $cakesCollected) . '</a></span>
            <span><a>Cakes Total:</a> <a>' . $cakesTotal . '</a></span>
        </div>
        <div class="table-scroll">' . $functOut . '</tbody></table></div>';
        return $functOut;
    } else {
        // Prepend statistics section to the output
        $functOut = '
        <div class="payment-details">
            <h1>Order Statistics</h1>
            <span><a>Amount Paid:</a> <a>R ' . $amountPaid . '</a></span>
            <span><a>Amount Outstanding:</a> <a>R ' . ($amountTotal - $amountPaid) . '</a></span>
            <span><a>Amount Total:</a> <a>R ' . $amountTotal . '</a></span>
            <span><a>Cakes Paid & Collected:</a> <a>' . $cakesCollected . '</a></span>
            <span><a>Cakes Ready for Collection:</a> <a>' . ($cakesTotal - $cakesCollected) . '</a></span>
            <span><a>Cakes Total:</a> <a>' . $cakesTotal . '</a></span>
        </div>
        <div class="table-scroll">' . $functOut . '<tr><td colspan="9">No Orders found :(</td></tr>';
        return $functOut;
    }
}

// This function gets all orders belonging to currently logged in user
function getAllOrders()
{
    $functOut = '
    <table>
    <thead>
        <tr>
            <th>
                ORDER NUMBER
            </th>
            <th>
                ORDER DATE
            </th>
            <th>
                CAKE NAME
            </th>
            <th>
                PICTURE
            </th>
            <th>
                QUANTITY
            </th>
            <th>
                TOTAL PRICE
            </th>
            <th>
                STATUS
            </th>
        </tr>
    </thead>
    <tbody>';
    // SQL query will join the orders to the users who created it
    $result = $GLOBALS['dbcon']->query(
        "SELECT * FROM orders 
        INNER JOIN cakes ON cakes.cakeID = orders.cakeID 
        INNER JOIN users ON users.userID = orders.userID 
        WHERE users.userEmail = '" . $_SESSION['userId'] . "'
        ORDER BY orders.orderDate DESC"
    );

    if ($result->num_rows > 0) {
        $paymentsOutstanding = '<hr>';

        // Generate the list of resulting orders
        while ($row = $result->fetch_assoc()) {
            $status = '';
            // Set the order status based on the DB variables
            if ($row['paid'] == 1) {
                if ($row['collected'] == 0) {
                    $status = 'Paid and Ready for Collection';
                } else if ($row['collected'] == 1) {
                    $status = 'Paid and Collected';
                }
            } else {
                $paymentsOutstanding .= '
                <span><a>Your Reference:</a> <a>OR' . $row['orderID'] . '</a></span>
                <span><a>Amount Outstanding:</a> <a>R ' . ($row['quantity'] * $row['cakePrice']) . '</a></span><hr>';
                $status = 'Payment Pending';
            }

            $functOut .= '
            <tr>
                <td>
                    OR' . $row['orderID'] . '
                </td>
                <td>
                    ' . $row['orderDate'] . '
                </td>
                <td>
                    ' . $row['cakeName'] . '
                </td>
                <td>
                    <img src="assets/images/' . strtolower(str_replace(" ", "-", $row['cakeName'])) . '.jpg">
                </td>
                <td>
                    ' . $row['quantity'] . '
                </td>
                <td>
                    R ' . ($row['quantity'] * $row['cakePrice']) . '
                </td>
                <td>
                    ' . $status . '
                </td>
            </tr>';
        }
        if (strcmp($paymentsOutstanding, '<hr>') == 0) {
            $paymentsOutstanding .= '<span><a>Amount Outstanding:</a> <a>R 0</a></span>';
        }
        // Prepend the payment details section to output
        $functOut = '
        <div class="payment-details">
            <h1>Payment Details</h1>
            <span><a>Bank:</a> <a>Capitec</a></span>
            <span><a>Branch Number:</a> <a>407001</a></span>
            <span><a>Account Name:</a> <a>CAKE INC.</a></span>
            <span><a>Account Number:</a> <a>123456789</a></span>
            ' . $paymentsOutstanding . '
        </div>
        <div class="table-scroll">' . $functOut . '</tbody></table></div>';
        return $functOut;
    } else {
        // Prepend the payment details section to output
        $functOut = '
        <div class="payment-details">
            <h1>Payment Details</h1>
            <span><a>Bank:</a> <a>Capitec</a></span>
            <span><a>Branch Number:</a> <a>407001</a></span>
            <span><a>Account Name:</a> <a>CAKE INC.</a></span>
            <span><a>Account Number:</a> <a>123456789</a></span>
            <span><a>Amount Outstanding:</a> <a>R 0</a></span>
        </div>
        <div class="table-scroll">' . $functOut . '<tr><td colspan="7">No Orders Yet :(</td></tr></tbody></table>';
        return $functOut;
    }
}

// Update the specified order record status to paid
function markOrderPaid($orderID)
{
    if ($GLOBALS['dbcon']->query(
        "UPDATE orders 
        SET paid=1 
        WHERE orderID=" . $orderID . ";"
    ) === TRUE) {
        return 'Order marked as Paid successfully';
    } else {
        return 'order could not be marked as paid: ' . $GLOBALS['dbcon']->error;
    }
}

// Update the specified order record status to collected
function markOrderCollected($orderID)
{
    if ($GLOBALS['dbcon']->query(
        "UPDATE orders 
        SET collected=1 
        WHERE orderID=" . $orderID . ";"
    ) === TRUE) {
        return 'Order marked as Collected successfully';
    } else {
        return 'order could not be marked as collected: ' . $GLOBALS['dbcon']->error;
    }
}

// Delete the specified order from the orders table
function deleteOrder($orderID)
{
    if ($GLOBALS['dbcon']->query(
        "DELETE FROM orders 
        WHERE orderID=" . $orderID . ";"
    ) === TRUE) {
        return 'Order deleted successfully';
    } else {
        return 'order could not be deleted at the moment: ' . $GLOBALS['dbcon']->error;
    }
}
