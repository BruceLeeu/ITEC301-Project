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
    <link rel="stylesheet" type="text/css" href="./css/faq.css">
    <link rel="stylesheet" type="text/css" href="./css/navbar.css">
    <title>CAKE INC.</title>
</head>

<body>
    <?php
    include 'navbar.php';
    ?>

    <h1>FREQUENTLY ASKED QUESTIONS ❔</h1>

    <div class="content" id="cakes-content">
        <div class="question">
            <h2>HOW DO I ORDER A CAKE? 💳</h2>
            <?php
            // Displays login/create account promp if user is not logged in
            if (empty($_SESSION["userId"])) {
            ?>
                <span>Before you start: Please <a href="login.php">Log in</a> or <a href="register.php">Create an account</a> to place an order!</span>
            <?php
            }
            ?>
            <span>Ordering is simple! Here are the steps:</span>
            <span>1. Browse for the cake of your selection on the cakes page and click on your desired cake to reveal more information.</span>
            <span>2. After selecting the desired amount of cakes and clikcing the 'ORDER NOW' button, the cake order will be added and you will be redirected to the orders page.</span>
            <span>NOTE: Your order can be in one of three states: Payment pending, Paid and Ready for Collection, and Paid and Collected.</span>
            <span>3. Please pay the owed amount to the account details listed on the top of the orders page, with the given Reference number.</span>
            <span>4. After the payment is received, I will start making your cake with lots of love.</span>
            <span>5. When your cake is ready for collection, you will receive an email and you can come and collect it at your soonest convenience during my business & collection hours.</span>
            <span>6. ENJOY YOUR CAKE!.</span>
            <span>Please note: Admin will be in contact with you throughout the process via email to assist with the process.</span>
        </div>

        <div class="question">
            <h2>WHAT ARE YOUR BUSINESS HOURS? 🕗</h2>
            <span>I am open on:</span>
            <span>Mondays - Fridays</span>
            <span>8 AM - 5 PM</span>
            <span>Please note that I'm closed on all national and public holidays.</span>
        </div>

        <div class="question">
            <h2>WHERE ARE YOU LOCATED? 📍</h2>
            <span>I’m located in Pinelands, Cape Town, but I don’t give out my exact address until you order in order to protect my privacy. I also protect my address because CAKE INC. is a HOME Bakery, so I don’t have a walk-in shopfront.</span>
        </div>

        <div class="question">
            <h2>DO YOU DELIVER? 📭</h2>
            <span>
                Unfortunately not. But some of my clients make regular trips from as far as Stellenbosch and Hout Bay because it’s worth it 😉 If you can’t make the drive, you are welcome to organize a courier service to collect your goods, although I can’t accept responsibility for the quality of their driving.</span>
        </div>

        <div class="question">
            <h2>DO YOU BAKE FOR WEDDINGS? 👰</h2>
            <span>I ONLY bake the cakes as listed on my website. If my style suits your wedding, then I’ll be happy to bake for your special day 🙂 Please keep in mind that I do not add any extras like flowers or toppers; you will need to source those yourself.</span>
        </div>

        <div class="question">
            <h2>DO YOU BAKE ANYTHING VEGAN OR SUGAR FREE? 🍰</h2>
            <span>Vegan and sugar free baking is not my passion at all. If you need such goods, please contact me and I will gladly refer you to someone who loves baking these types of cakes 🙂</span>
        </div>

        <div class="question">
            <h2>I HAVE A QUESTION THAT'S NOT LISTED? ❔</h2>
            <span>If you've read all the listed answers, but you still have a question then please contact me on <a href="mailto:lynette@cakeinc.com">lynette@cakeinc.com</a> and I will gladly answer it as soon as possible!</span>
        </div>
    </div>

</body>

</html>