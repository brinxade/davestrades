<?php require_once "php/bootstrap.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Dave&apos;s Trades - Login</title>
    <?= $site_commons["head"]; ?>
</head>
<body>
    <main class="accounts">
        <div class="content">
            <div class="logo center">
                <a href="/"><img src="images/logo-text.png" class="logo-text logo-large" alt="logo"/></a>
                <p class="logo-tagline">Where The Trades Play Poker...Only in Ontario</p>
            </div>
        </div>
        <div class="accounts-form closable-con">
            <a class="closable-close" href="/"><i class="fas fa-times" aria-hidden="true"></i></a>
            <div class="inner">
                <form id="login-form" class="form-modern">
                    <h1 class="title">Login</h1>
                    <fieldset>
                        <label>Email</label>
                        <input id="username" class="textbox" type="email" placeholder="Type your email"/>
                    </fieldset>
                    <fieldset>
                        <label>Password</label>
                        <input id="password" class="textbox" type="password" placeholder="Type your password"/>
                    </fieldset>
                    <div class="utility-links">
                        <a href="forgot-password.php">Forgot Password?</a>
                    </div>
                    <div class="submission">
                        <p class="status-text">Invalid Credentials</p>
                        <button class="form-submit btn btn-loader" type="submit">
                            <div class="loader"></div>
                            <span class="text">Login</span>
                        </button>
                    </div>
                    <a href="signup.php" class="form-swap">Don't have an account? Sign up.</a>
                </form>
            </div>
        </div>
    </main>

    <?= $site_commons["body-scripts"] ?>
</body>
</html>