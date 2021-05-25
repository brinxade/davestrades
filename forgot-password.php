<?php require_once "php/bootstrap.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Dave&apos;s Trades - Password Reset</title>
    <?= $site_commons["head"]; ?>
</head>
<body>
    <main class="accounts">
        <div class="content">
        <div class="modal forgot-password">
            <div class="modal-header">
                <h1 class="title">Password Reset</h1>
            </div>
            <div class="modal-content">
                <p>Please type in your registered email, password reset link will be sent to the given email address.</p>
                <input id="reset-email" class="textbox focus-border" type="text" placeholder="Registered Email Address"/>
            </div>
            <div class="modal-footer">
                <button class="form-submit btn btn-medium bg-green btn-loader" type="submit">
                    <div class="loader"></div>
                    <span class="text">Reset</span>
                </button>
                <a class="btn btn-medium" href="/login.php">Cancel</a>
            </div>
        </form>
        </div>
    </main>

    <?= $site_commons["body-scripts"] ?>
</body>
</html>