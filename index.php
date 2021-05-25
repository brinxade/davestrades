<?php require_once "php/bootstrap.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Dave&apos;s Trades</title>
    <?= $site_commons["head"]; ?>
</head>
<body>
    <?= $site_commons["site-header"] ?>
    <main>
        <div class="poker-hero two-col">
            <section>
                <div id="poker-table">
                    <div class="wrapper">
                        <div class="poker-chair"><div class="poker-chair-inner"><div class="poker-chair-label"><img class="flag" src="/images/ui/flag-canada.png" alt="flag"/> Pitiful Painter</div></div></div>
                        <div class="poker-chair"><div class="poker-chair-inner"><div class="poker-chair-label"><img class="flag" src="/images/ui/flag-canada.png" alt="flag"/> Lousy Laborer</div></div></div>
                        <div class="poker-chair"><div class="poker-chair-inner"><div class="poker-chair-label"><img class="flag" src="/images/ui/flag-canada.png" alt="flag"/> Sparky</div></div></div>
                        <div class="poker-chair"><div class="poker-chair-inner"><div class="poker-chair-label"><img class="flag" src="/images/ui/flag-canada.png" alt="flag"/> Crappy Carpenter</div></div></div>
                        <div class="poker-chair"><div class="poker-chair-inner"><div class="poker-chair-label"><img class="flag" src="/images/ui/flag-canada.png" alt="flag"/> Drunken Drywaller</div></div></div>
                        <div class="poker-chair"><div class="poker-chair-inner"><div class="poker-chair-label"><img class="flag" src="/images/ui/flag-canada.png" alt="flag"/> Anonymous</div></div></div>
                        <div class="poker-chair"><div class="poker-chair-inner"><div class="poker-chair-label"><img class="flag" src="/images/ui/flag-canada.png" alt="flag"/> Anonymous</div></div></div>
                        <div class="poker-chair"><div class="poker-chair-inner"><div class="poker-chair-label"><img class="flag" src="/images/ui/flag-canada.png" alt="flag"/> Anonymous</div></div></div>
                        <div class="inner">
                            <div class="inner-content">
                                <h2 class="table-text">Dave's Trades</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <aside class="v-center">
                <div class="palette rounded sidebar">
                    <button class="btn rounded-5 btn-block">Cashier</button>
                    <button class="btn rounded-5 btn-block">Legal Eagles</button>
                    <p class="mb-5">Region</p>
                    <select class="rounded-5">
                        <option>Brampton</option>
                        <option>Toronto</option>
                        <option>Mississauga</option>
                    </select>
                </div>
                <div class="palette rounded chatroom-wrapper">
                    <div class="chatroom">
                        <div class="chatroom-inner">
                            <p class="placeholder">No previous messages</p>
                        </div>
                        <input class="chatroom-msg" type="text" placeholder="Send message..."/>
                    </div>
                </div>
            </aside>
        </div>
    </main>
    <?= $site_commons["site-footer"] ?>
    <?= $site_commons["body-scripts"] ?>
</body>
</html>