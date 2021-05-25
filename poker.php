<?php require_once "php/bootstrap.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Poker at Dave&apos;s Trades</title>
    <?= $site_commons["head"]; ?>
</head>
<body>
    <?= $site_commons["site-header"] ?>
    <main>
        <div class="two-col">
            <section>
                <div class="image-banner banner-border">
                    <img src="images/bg/poker-cards.png" alt="Poker Cards"/>
                    <div class="content">
                        <h2 class="title">Tournament Prizes</h2>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris. Fusce nec tellus sed augue semper porta. Mauris massa. Vestibulum lacinia arcu eget nulla. 
                        </p>
                    </div>
                </div>
                <div class="hero-palette">
                    <p>
                        No prizes for now
                    </p>
                </div>
            </section>
            <aside>
                <div class="palette rounded-5">
                    <h3 class="title">Players</h3>
                    <p>
                        No players have registered yet
                    </p>
                </div>
                <div class="palette rounded-5">
                    <h3 class="title">Register</h3>
                    <p>
                        Register here for the monthly Poker tournament to win the exciting prizes from the prize board (or lose all your money in trying to win)
                    </p>
                    <button class="rounded-5 btn btn-block">Register</button>
                </div>
            </aside>
        </div>
    </main>
    <?= $site_commons["site-footer"] ?>
    <?= $site_commons["body-scripts"] ?>
</body>
</html>