<?php
/*
* Louis la Grange | SL2CQH2H6
* BSc IT 3A | ITEC301
*/

// Starts a new PHP session
session_start();

// User redirected to home page after being logged out
echo '<html>
        <head>
          <meta charset="UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <link rel="icon" href="assets/logos/slice-cake-yellow.png" type="image/png">
          <link rel="stylesheet" type="text/css" href="./css/navbar.css">
          <title>CAKE INC.</title>
          <meta http-equiv="refresh" content="1; url=home.php" />
        </head>
        <h1>Logged out...</h1>
      </html>';
// function that Destroys login Session 
session_destroy();
