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
    <link rel="stylesheet" type="text/css" href="./css/cake-info.css">
    <link rel="stylesheet" type="text/css" href="./css/navbar.css">
    <title>CAKE INC.</title>
</head>

<body>
    <?php
    include 'navbar.php';
    ?>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialise a new AJAX call, after page is loaded
            var xmlhttp = new XMLHttpRequest();

            // This function will listen for a result from the dbms.php file
            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == XMLHttpRequest.DONE) {
                    if (xmlhttp.status == 200) {
                        // dbms function executed with no error
                        document.getElementById('cakes-content').innerHTML = xmlhttp.responseText;
                        updateSum();
                    } else if (xmlhttp.status == 400) {
                        alert('There was an error 400');
                    } else {
                        alert('something else other than 200 was returned');
                    }
                }
            };

            // Send a POST request to dbms.php to get the cakes info
            xmlhttp.open('POST', 'dbms.php', true);
            xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xmlhttp.send('query=cakeInfo&' + window.location.search.replace("?", ""));
        }, false);

        function updateSum() {
            // Get amount from input field
            document.getElementById('error-msg').innerHTML = '';
            var amountCakes = parseInt(document.getElementById('amount').value);

            // Amount of cakes validation
            if (amountCakes <= 10 && amountCakes >= 1) {
                // Update total amount
                var price = 0;
                price = parseFloat(document.getElementById('price').innerHTML);

                var amount = 0;
                amount = parseInt(document.getElementById('amount').value);

                var total = 0.00;
                total = price * amount;
                document.getElementById('total').innerHTML = total;
            } else {
                document.getElementById('error-msg').innerHTML = 'Please enter a valid amount between 1 and 10';
            }
        }

        function addOrder() {
            // Get amount from input field
            document.getElementById('error-msg').innerHTML = '';
            var amountCakes = parseInt(document.getElementById('amount').value);

            // If valid amount of cakes entered, add record to DB
            if (amountCakes <= 10 && amountCakes >= 1) {
                // Initialise a new AJAX call
                var xmlhttp = new XMLHttpRequest();

                // This function will listen for a result from the dbms.php file
                xmlhttp.onreadystatechange = function() {
                    if (xmlhttp.readyState == XMLHttpRequest.DONE) {
                        if (xmlhttp.status == 200) {
                            if (xmlhttp.responseText === 'Success!') {
                                window.open('orders.php', '_self');
                            } else {
                                alert('Your order could not be processed right now. ' + xmlhttp.responseText);
                            }

                        } else if (xmlhttp.status == 400) {
                            alert('There was an error 400');
                        } else {
                            alert('something else other than 200 was returned');
                        }
                    }
                };
                // Send a POST request to dbms.php to add order to DB
                xmlhttp.open('POST', 'dbms.php', true);
                xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                xmlhttp.send('query=addOrder&' + window.location.search.replace("?", "") + "&amount=" + amountCakes);
            } else {
                document.getElementById('error-msg').innerHTML = 'Please enter a valid amount between 1 and 10';
            }
        }
    </script>

    <div class="cakes-content" id="cakes-content">
        <!-- Cake info HTML will be inserted here from server -->
    </div>

</body>

</html>