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
    <link rel="stylesheet" type="text/css" href="./css/register.css">
    <title>CAKE INC.</title>
</head>

<body>
    <div class="register-page">
        <div class="form">
            <a>CAKE INC. Registration</a>
            <img src="./assets/logos/slice-cake-yellow.png" width="100" height="100" class="register-img">

            <div class="register-form">
                <input type="text" placeholder="names" name="txtName" id="txtName">
                <input type="text" placeholder="email" name="txtEmail" id="txtEmail">
                <input type="password" placeholder="password" name="txtPassword" id="txtPassword">
                <button class="button" onclick="register()">CREATE ACCOUNT!</button>
                <span class="register-message" id="register-message"></span>
                <span class="login" id="login">
                    <a href="login.php">
                        Already have an account? Click here to log in!
                    </a>
                </span>
            </div>
        </div>
    </div>
</body>

<script>
    function register() {
        // Registration validation status reset
        document.getElementById('register-message').innerHTML = '';
        document.getElementById('register-message').classList.remove('error');
        document.getElementById('txtName').classList.remove('error');
        document.getElementById('txtEmail').classList.remove('error');
        document.getElementById('txtPassword').classList.remove('error');

        // Get values from fields
        var name = document.getElementById('txtName').value;
        var email = document.getElementById('txtEmail').value;
        var password = document.getElementById('txtPassword').value;

        // Initialise new AJAX request
        var xmlhttp = new XMLHttpRequest();

        // Listen for the AJAX response from server
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == XMLHttpRequest.DONE) {
                if (xmlhttp.status == 200) {
                    var res = xmlhttp.responseText + "";
                    // If response received is successful, inform and redirect user
                    if (res === "Account Created!") {
                        document.getElementById('register-message').innerHTML = res;
                        // Redirect user after one second delay
                        setTimeout(() => {
                            window.open('home.php', '_self');
                        }, 1000);
                    } else {
                        // Credentials not valid
                        document.getElementById('register-message').innerHTML = res;
                        document.getElementById('register-message').classList.add('error');
                    }
                } else if (xmlhttp.status == 400) {
                    alert('There was an error 400');
                } else {
                    alert('something else other than 200 was returned');
                }
            }
        };

        // Regex validation to ensure valid names are entered
        if (/^[a-zA-Z -]+$/.test(name)) {
            // Regex validation to ensure a valid email is entered
            if (/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email)) {
                if (password != '') {
                    // If names/email/password are valid, send credentials to DBMS to be validated
                    xmlhttp.open('POST', 'dbms.php', true);
                    xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                    xmlhttp.send('query=register&usr=' + email + '&pwd=' + password + '&name=' + name);
                } else {
                    // Invalid password
                    document.getElementById('register-message').innerHTML = 'Please enter a password';
                    document.getElementById('register-message').classList.add('error');
                    document.getElementById('txtPassword').classList.add('error');
                }
            } else {
                // Invalid email
                document.getElementById('register-message').innerHTML = 'Please enter a valid email address';
                document.getElementById('register-message').classList.add('error');
                document.getElementById('txtEmail').classList.add('error');
            }
        } else {
            // Invalid names
            document.getElementById('register-message').innerHTML = 'Please enter valid names';
            document.getElementById('register-message').classList.add('error');
            document.getElementById('txtName').classList.add('error');

        }
    }
</script>

</html>