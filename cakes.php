<?php
/*
* Louis la Grange | SL2CQH2H6
* BSc IT 3A | ITEC301
*/

// Starts a new PHP session
session_start();

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/logos/slice-cake-yellow.png" type="image/png">
    <link rel="stylesheet" type="text/css" href="./css/cakes.css">
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
                        // Insert cakes into placeholder
                        document.getElementById('cakes-content').innerHTML = xmlhttp.responseText;
                    } else if (xmlhttp.status == 400) {
                        alert('There was an error 400');
                    } else {
                        alert('something else other than 200 was returned');
                    }
                }
            };

            // Send a POST request to dbms.php to get all the cakes from DB
            xmlhttp.open('POST', 'dbms.php', true);
            xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xmlhttp.send('query=loadCakes');
        }, false);
    </script>

    <h1>CAKE SHOP 🎂</h1>

    <div class="content" id="cakes-content">
        <!-- Cakes HTML will be inserted here from server -->
    </div>

</body>

</html>