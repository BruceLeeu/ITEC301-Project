<?php
/*
* Louis la Grange | SL2CQH2H6
* BSc IT 3A | ITEC301
*/

// Starts a new PHP session
session_start();

// User redirected if no current session is found
if (!empty($_SESSION["userId"])) {
} else {
    header("Location: login.php");
}

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/logos/slice-cake-yellow.png" type="image/png">
    <link rel="stylesheet" type="text/css" href="./css/orders.css">
    <link rel="stylesheet" type="text/css" href="./css/navbar.css">
    <title>CAKE INC.</title>
</head>

<body>
    <?php
    include 'navbar.php';
    ?>

    <?php
    // If logged in user is admin, display this title
    if ($_SESSION["userType"] == 1) {
    ?>
        <h1>ALL ORDERS 📑</h1>
    <?php
    } else { // Else display this title
    ?>
        <h1>YOUR ORDERS 📑</h1>
    <?php
    }

    ?>

    <div class="content" id="orders-content">
        <div class="table-scroll" id="table-scroll">
            <!-- Orders content HTML will be inserted here from server -->
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // After page is loaded, get orders from DB
            getAllOrders();
        }, false);

        function markPaid(orderID) {
            // Initialise new AJAX request
            var xmlhttp = new XMLHttpRequest();

            // Listen for the AJAX response from server
            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == XMLHttpRequest.DONE) {
                    if (xmlhttp.status == 200) {
                        // Refresh orders, after successfully marked paid
                        getAllOrders();
                    } else if (xmlhttp.status == 400) {
                        alert('There was an error 400');
                    } else {
                        alert('something else other than 200 was returned');
                    }
                }
            };

            // Send AJAX request to DBMS, to mark specified order as paid
            xmlhttp.open('POST', 'dbms.php', true);
            xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xmlhttp.send('query=markPaid&orderID=' + orderID);
        }

        function markCollected(orderID) {
            // Initialise new AJAX request
            var xmlhttp = new XMLHttpRequest();

            // Listen for the AJAX response from server
            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == XMLHttpRequest.DONE) {
                    if (xmlhttp.status == 200) {
                        // Refresh orders, after successfully marked collected
                        getAllOrders();
                    } else if (xmlhttp.status == 400) {
                        alert('There was an error 400');
                    } else {
                        alert('something else other than 200 was returned');
                    }
                }
            };

            // Send AJAX request to DBMS, to mark specified order as collected
            xmlhttp.open('POST', 'dbms.php', true);
            xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xmlhttp.send('query=markCollected&orderID=' + orderID);
        }

        function getAllOrders(orderID) {
            // Initialise new AJAX request
            var xmlhttp = new XMLHttpRequest();

            // Listen for the AJAX response from server
            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == XMLHttpRequest.DONE) {
                    if (xmlhttp.status == 200) {
                        // Insert orders list HTML into placeholder div
                        document.getElementById('orders-content').innerHTML = xmlhttp.responseText;
                    } else if (xmlhttp.status == 400) {
                        alert('There was an error 400');
                    } else {
                        alert('something else other than 200 was returned');
                    }
                }
            };

            // Send AJAX request to DBMS, to get all order records
            xmlhttp.open('POST', 'dbms.php', true);
            xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xmlhttp.send('query=getAllOrders');
        }

        function deleteOrder(orderID) {
            // Initialise new AJAX request
            var xmlhttp = new XMLHttpRequest();

            // Listen for the AJAX response from server
            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == XMLHttpRequest.DONE) {
                    if (xmlhttp.status == 200) {
                        // Refresh orders, after successfully deleted order
                        getAllOrders();
                    } else if (xmlhttp.status == 400) {
                        alert('There was an error 400');
                    } else {
                        alert('something else other than 200 was returned');
                    }
                }
            };

            // Send AJAX request to DBMS, to get all order records
            xmlhttp.open('POST', 'dbms.php', true);
            xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xmlhttp.send('query=deleteOrder&orderID=' + orderID);
        }
    </script>
</body>

</html>