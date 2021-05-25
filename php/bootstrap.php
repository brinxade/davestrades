<?php

$time=time();
$site_commons=array();
$site_commons["head"]='
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="css/reset.css?v='.$time.'"/>
    <link rel="stylesheet" type="text/css" href="css/ui.css?v='.$time.'"/>
    <link rel="stylesheet" type="text/css" href="css/style.css?v='.$time.'"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
';

$site_commons["body-scripts"]='
    <script src="scripts/user.phoenix.js?v='.$time.'" crossorigin></script>
    <script src="scripts/header.site.js?v='.$time.'" crossorigin></script>
    <script src="scripts/form-handler.js?v='.$time.'" crossorigin></script>
    <script src="https://unpkg.com/react@17/umd/react.development.js" crossorigin></script>
    <script src="https://unpkg.com/react-dom@17/umd/react-dom.development.js" crossorigin></script>
    <script src="https://kit.fontawesome.com/6f67bd47b3.js" crossorigin="anonymous"></script>
';

$site_commons["site-header"]='
    <header id="header">
        <div class="content">
            <div class="header-left logo">
                <a href="/"><img class="logo-img" src="images/logo.png" alt="logo-image"/>
                <a href="/about-us.php" class="btn rounded-5">About Us</a>
            </div>
            <div class="header-mid logo">
                <img class="logo-text" src="/images/logo-text.png" alt="logo"/>
                <p class="logo-tagline">
                    And its free for the trades...you cheap bastards
                    <span class="censor">Censored</span>
                </p>
            </div>
            <div class="header-right">
                <a href="/login.php" class="btn"><i class="icon fas fa-sign-in-alt"></i> Login</a>
                <a href="/signup.php" class="btn"><i class="icon fas fa-user-plus"></i> Sign Up</a>
            </div>
        </div>
        <nav id="site-nav">
            <a id="site-nav-btn" href="#"><i class="fas fa-bars"></i></a>
            <div class="content">
                <a href="/">Home</a>
                <a href="/trades-and-contractors.php">Trades and Contractors</a>
                <a href="/classic-cars.php">Classic Cars</a>
                <a href="/daves-cool-stuff.php">Dave&apos;s Cool Stuff</a>
                <a href="/rock-n-roll.php">Rock N&apos; Roll</a>
                <a href="/pictures.php">Pictures</a>
                <a href="/toolbox.php">Toolbox</a>
                <a href="/poker.php">Poker</a>
            </div>
        </nav>
    </header>
';

$site_commons["site-footer"]='
    <footer id="footer">
        <div class="content">
            <div class="footer-group">
                <div class="company-info">
                    <h3 class="company-name">Dave&apos;s Trades</h3>
                    <span class="company-tagline">Where Trades Play Poker</span>
                    <address class="company-address">Brampton, ON</address>
                </div>
            </div>
            <div class="footer-group">
                <h4 class="title">Quicklinks</h4>
                <nav>
                    <a href="/poker.php">Poker Tournaments</a>
                </nav>
            </div>
            <div class="footer-group">
                <h4 class="title">Legal</h4>
                <nav>
                    <a>Privacy Policy</a>
                    <a>Terms of Use</a>
                </nav>
            </div>
            <div class="footer-group newsletter-sub">
                <h4 class="title">Weekly Newsletter</h4>
                <input class="sub-email textbox" type="text" placeholder="john.doe@gmail.com"/>
                <button class="sub-subscribe btn">Subscribe</button>
                <p id="sub-status"></p>
            </div>
        </div>
        </div>
        <p class="copyright">Designed by Brinxade &copy; 2020. All Rights Reserved.</p>
    </footer>
';

?>