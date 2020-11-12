<?php
/*
* Louis la Grange | SL2CQH2H6
* BSc IT 3A | ITEC301
*/

// Navbar is added to all main pages with the include() function.
?>

<body>
    <nav>
        <li class="logo">
            <img src="assets/logos/slice-cake-yellow.png" alt="CAKE INK.">
        </li>
        <ul class="menu" id="menu">
            <li class="menu-item">
                <a class="menu-link" href="home.php">
                    <svg aria-hidden="true" focusable="false" data-icon="oven" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                        <path fill="currentColor" d="M384,0H64A64,64,0,0,0,0,64V480a32,32,0,0,0,32,32H416a32,32,0,0,0,32-32V64A64,64,0,0,0,384,0Zm32,480H32V160H416Zm0-352H32V64A32,32,0,0,1,64,32H384a32,32,0,0,1,32,32ZM368,64a16,16,0,1,0,16,16A16,16,0,0,0,368,64Zm-64,0a16,16,0,1,0,16,16A16,16,0,0,0,304,64ZM144,64a16,16,0,1,0,16,16A16,16,0,0,0,144,64ZM80,64A16,16,0,1,0,96,80,16,16,0,0,0,80,64Zm0,384H368a16,16,0,0,0,16-16V208a16,16,0,0,0-16-16H80a16,16,0,0,0-16,16V432A16,16,0,0,0,80,448ZM96,224H352V416H96Zm208,32H144a16,16,0,0,0,0,32H304a16,16,0,0,0,0-32Z" class="icon-primary"></path>
                    </svg>
                    <span class="link-text">Home</span>
                </a>
            </li>
            <li class="menu-item">
                <a class="menu-link" href="cakes.php">
                    <svg aria-hidden="true" focusable="false" data-icon="birthday-cake" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                        <path fill="currentColor" d="M96 96c-17.75 0-32-14.25-32-32 0-31 32-23 32-64 12 0 32 29.5 32 56s-14.25 40-32 40zm128 0c-17.75 0-32-14.25-32-32 0-31 32-23 32-64 12 0 32 29.5 32 56s-14.25 40-32 40zm128 0c-17.75 0-32-14.25-32-32 0-31 32-23 32-64 12 0 32 29.5 32 56s-14.25 40-32 40zm48 160h-32V112h-32v144h-96V112h-32v144h-96V112H80v144H48c-26.5 0-48 21.5-48 48v208h448V304c0-26.5-21.5-48-48-48zm16 224H32v-72.043C48.222 398.478 55.928 384 74.75 384c27.951 0 31.253 32 74.75 32 42.843 0 47.217-32 74.5-32 28.148 0 31.201 32 74.75 32 43.357 0 46.767-32 74.75-32 18.488 0 26.245 14.475 42.5 23.955V480zm0-112.374C406.374 359.752 394.783 352 373.5 352c-43.43 0-46.825 32-74.75 32-27.695 0-31.454-32-74.75-32-42.842 0-47.218 32-74.5 32-28.148 0-31.202-32-74.75-32-21.463 0-33.101 7.774-42.75 15.658V304c0-8.822 7.178-16 16-16h352c8.822 0 16 7.178 16 16v63.626z" class="icon-primary"></path>
                    </svg>
                    <span class="link-text">Cakes</span>
                </a>
            </li>
            <li class="menu-item">
                <a class="menu-link" href="orders.php">
                    <svg aria-hidden="true" focusable="false" data-icon="stream" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path fill="currentColor" d="M16 128h416c8.84 0 16-7.16 16-16V80c0-8.84-7.16-16-16-16H16C7.16 64 0 71.16 0 80v32c0 8.84 7.16 16 16 16zm480 96H80c-8.84 0-16 7.16-16 16v32c0 8.84 7.16 16 16 16h416c8.84 0 16-7.16 16-16v-32c0-8.84-7.16-16-16-16zm-64 160H16c-8.84 0-16 7.16-16 16v32c0 8.84 7.16 16 16 16h416c8.84 0 16-7.16 16-16v-32c0-8.84-7.16-16-16-16z" class="icon-primary"></path>
                    </svg>
                    <span class="link-text">Orders</span>
                </a>
            </li>
            <li class="menu-item">
                <a class="menu-link" href="faq.php">
                    <svg aria-hidden="true" focusable="false" data-icon="question" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                        <path fill="currentColor" d="M199.65 0C125.625 0 69.665 30.187 27.21 92.51c-19.17 28.15-12.94 66.3 14.17 86.86l36.73 27.85c10.81 8.2 24.19 12.79 37.74 12.96-11.84 19-17.82 40.61-17.82 64.55v11.43c0 16.38 6.2 31.34 16.38 42.65C97.99 357.2 88 381.45 88 408c0 57.35 46.65 104 104 104s104-46.65 104-104c0-26.55-9.99-50.8-26.41-69.19 8.66-9.62 14.43-21.87 15.97-35.38 28.287-16.853 96-48.895 96-138.21C381.56 71.151 290.539 0 199.65 0zM192 464c-30.88 0-56-25.12-56-56 0-30.873 25.118-56 56-56 30.887 0 56 25.132 56 56 0 30.88-25.12 56-56 56zm45.97-176.21v8.37c0 8.788-7.131 15.84-15.84 15.84h-60.26c-8.708 0-15.84-7.051-15.84-15.84v-11.43c0-47.18 35.77-66.04 62.81-81.2 23.18-13 37.39-21.83 37.39-39.04 0-22.77-29.04-37.88-52.52-37.88-30.61 0-44.74 14.49-64.6 39.56-5.365 6.771-15.157 8.01-22 2.8l-36.73-27.85c-6.74-5.11-8.25-14.6-3.49-21.59C98.08 73.73 137.8 48 199.65 48c64.77 0 133.91 50.56 133.91 117.22 0 88.51-95.59 89.87-95.59 122.57z" class="icon-primary"></path>
                    </svg>
                    <span class="link-text">FAQ</span>
                </a>
            </li>
            <?php
            // If no user is logged in, display the Log In button
            if (empty($_SESSION["userId"])) {
            ?>
                <li class="menu-item">
                    <a class="menu-link" href="login.php">
                        <svg aria-hidden="true" focusable="false" data-icon="sign-in" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <path fill="currentColor" d="M416 448h-84c-6.6 0-12-5.4-12-12v-24c0-6.6 5.4-12 12-12h84c26.5 0 48-21.5 48-48V160c0-26.5-21.5-48-48-48h-84c-6.6 0-12-5.4-12-12V76c0-6.6 5.4-12 12-12h84c53 0 96 43 96 96v192c0 53-43 96-96 96zM167.1 83.5l-19.6 19.6c-4.8 4.8-4.7 12.5.2 17.1L260.8 230H12c-6.6 0-12 5.4-12 12v28c0 6.6 5.4 12 12 12h248.8L147.7 391.7c-4.8 4.7-4.9 12.4-.2 17.1l19.6 19.6c4.7 4.7 12.3 4.7 17 0l164.4-164c4.7-4.7 4.7-12.3 0-17l-164.4-164c-4.7-4.6-12.3-4.6-17 .1z" class="icon-primary"></path>
                        </svg>
                        <span class="link-text">Log In</span>
                    </a>
                </li>
            <?php
            } else { // Else display the Log Out button
            ?>
                <li class="menu-item">
                    <a class="menu-link last" href="logout.php">
                        <svg aria-hidden="true" focusable="false" data-icon="sign-out" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <path fill="currentColor" d="M96 64h84c6.6 0 12 5.4 12 12v24c0 6.6-5.4 12-12 12H96c-26.5 0-48 21.5-48 48v192c0 26.5 21.5 48 48 48h84c6.6 0 12 5.4 12 12v24c0 6.6-5.4 12-12 12H96c-53 0-96-43-96-96V160c0-53 43-96 96-96zm231.1 19.5l-19.6 19.6c-4.8 4.8-4.7 12.5.2 17.1L420.8 230H172c-6.6 0-12 5.4-12 12v28c0 6.6 5.4 12 12 12h248.8L307.7 391.7c-4.8 4.7-4.9 12.4-.2 17.1l19.6 19.6c4.7 4.7 12.3 4.7 17 0l164.4-164c4.7-4.7 4.7-12.3 0-17l-164.4-164c-4.7-4.6-12.3-4.6-17 .1z" class="icon-primary"></path>
                        </svg>
                        <span class="link-text logout">Log Out</span>
                        <span class="link-text email"><?php echo ($_SESSION['userId']); ?></span>
                    </a>
                </li>
            <?php
            }
            ?>
        </ul>
        <li class="menu-toggle" id="menu-toggle" onclick="menuToggle()">
            <svg aria-hidden="true" focusable="false" data-icon="utensil-fork" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                <path fill="currentColor" d="M469.5 119.4L356.3 232.6c-3.8 1.7-14.7-9.5-12.9-12.9 19.2-21.5 105.3-117.9 107.3-120.1 14.1-19.3-19.1-52.5-38.4-38.4-2.3 2-98.7 88.1-120.1 107.3-3.4 1.8-14.6-9.1-12.9-12.9L392.5 42.4c15.4-19.4-18.7-53-37.5-39.3-4.4 3.1-88.6 62.8-116.2 90.3-41.8 41.8-49.6 94.1-28.7 139.1L9 413.2c-11.6 10.5-12.1 28.5-1 39.5L59.3 504c11 11 29.1 10.5 39.5-1.1l180.5-201.2c45 20.9 97.2 13.3 139.1-28.7 27.6-27.6 87.3-111.8 90.4-116.2 13.7-18.7-19.9-52.7-39.3-37.4z" class="icon-primary"></path>
            </svg>
        </li>
    </nav>

    <script>
        // This function adds/removes the active class when the menu button is pressed
        function menuToggle() {
            var nav = document.getElementById('menu');
            nav.classList.toggle('active');
            var toggle = document.getElementById('menu-toggle');
            toggle.classList.toggle('active');
        }
    </script>
</body>