<?php
/*
* Louis la Grange | SL2CQH2H6
* BSc IT 3A | ITEC301
*/

// Starts a new PHP session
session_start();

// User redirected if no current session is found
if (!empty($_SESSION["userId"])) {
    header("Location: home.php");
}

?>

<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/logos/slice-cake-yellow.png" type="image/png">
    <link rel="stylesheet" type="text/css" href="./css/login.css">
    <title>CAKE INC.</title>
</head>

<body>
    <div class="login-page">
        <div class="form">
            <a>CAKE INC. Login</a>
            <img src="./assets/logos/slice-cake-yellow.png" width="100" height="100" class="login-img">

            <div class="login-form">
                <input type="text" placeholder="email" name="txtEmail" id="txtEmail">
                <input type="password" placeholder="password" name="txtPassword" id="txtPassword">
                <button class="button" onclick="login()">LOG IN</button>
                <span class="login-message" id="login-message"></span>
                <span class="register" id="register">
                    <a href="register.php">
                        Dont have an account? Click here to register!
                    </a>
                </span>
            </div>
        </div>
    </div>
</body>

<script>
    function login() {
        // Login validation status reset
        document.getElementById('login-message').innerHTML = '';
        document.getElementById('login-message').classList.remove('error');
        document.getElementById('txtEmail').classList.remove('error');
        document.getElementById('txtPassword').classList.remove('error');

        // Get values from fields
        var email = document.getElementById('txtEmail').value;
        var password = document.getElementById('txtPassword').value;

        // Initialise new AJAX request
        var xmlhttp = new XMLHttpRequest();

        // Method will listen and execute when AJAX response is received
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == XMLHttpRequest.DONE) {
                if (xmlhttp.status == 200) {
                    var res = xmlhttp.responseText + '';
                    if (res === 'User Logged in Successfully!') {
                        // Credentials match DB records
                        document.getElementById('login-message').innerHTML = res;
                        // Delay one second before redirected
                        setTimeout(() => {
                            window.open('home.php', '_self');
                        }, 1000);
                    } else {
                        // Credentials invalid
                        document.getElementById('login-message').innerHTML = res;
                        document.getElementById('login-message').classList.add('error');
                    }
                } else if (xmlhttp.status == 400) {
                    alert('There was an error 400');
                } else {
                    alert('something else other than 200 was returned');
                }
            }
        };

        // Regex validation to ensure a valid email address is entered.
        if (/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email)) {
            if (password != '') {
                // If email/password are valid, send credentials to DBMS to be validated
                xmlhttp.open('POST', 'dbms.php', true);
                xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                xmlhttp.send('query=login&usr=' + email + '&pwd=' + password);
            } else {
                // Invalid password
                document.getElementById('login-message').innerHTML = 'Please enter a password';
                document.getElementById('login-message').classList.add('error');
                document.getElementById('txtPassword').classList.add('error');
            }
        } else {
            // Invalid email
            document.getElementById('login-message').innerHTML = 'Please enter a valid email address';
            document.getElementById('login-message').classList.add('error');
            document.getElementById('txtEmail').classList.add('error');
        }
    }
</script>

</html>