<?php require_once "php/bootstrap.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Dave&apos;s Trades - Sign Up</title>
    <?= $site_commons["head"]; ?>
</head>
<body>
    <main class="accounts">
        <div class="content">
            <div class="logo center">
                <a href="/">
                    <img src="images/logo-text.png" class="logo-text logo-large" alt="logo"/>
                </a>
                <p class="logo-tagline">Where The Trades Play Poker...Only in Ontario</p>
            </div>
        </div>
        <div class="accounts-form closable-con">
            <a class="closable-close" href="/"><i class="fas fa-times" aria-hidden="true"></i></a>
            <div class="inner">
                <form id="signup-form" class="form-modern">
                    <h1 class="title">Sign Up</h1>
                    <fieldset>
                        <label>Email</label>
                        <input id="reg-username" class="textbox" type="text" placeholder="Type your email"/>
                    </fieldset>
                    <fieldset>
                        <label>Password</label>
                        <input id="reg-password" class="textbox" type="password" placeholder="Type your password"/>
                    </fieldset>
                    <fieldset>
                        <label>Confirm Password</label>
                        <input id="reg-cpassword" class="textbox" type="password" placeholder="Type again"/>
                    </fieldset>
                    <div class="checkbox">
                        <input id="reg-tos" type="checkbox" value="1"/>
                        <label for="reg-tos">I Agree to Terms of Services</label>
                    </div>
                    <div class="checkbox">
                        <input id="reg-newsletter" type="checkbox" value="1"/>
                        <label for="reg-newsletter">Subscribe to weekly newsletter</label>
                    </div>
                    <div class="submission">
                        <p class="status-text">Invalid Credentials</p>
                        <button class="form-submit btn btn-loader" type="submit">
                            <div class="loader"></div>
                            <span class="text">Sign Up</span>
                        </button>
                    </div>
                    <a href="login.php" class="form-swap">Already have an account? Sign In.</a>
                </form>
            </div>
        </div>
    </main>

    <?= $site_commons["body-scripts"] ?>
</body>
</html>