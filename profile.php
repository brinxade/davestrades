<?php require_once "php/bootstrap.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Dave&apos;s Trades - Profile</title>
    <?= $site_commons["head"]; ?>
</head>
<body>
    <?= $site_commons["site-header"] ?>
    <main>
        <section id="profile">
            <div class="profile-banner">
                <img class="profile-hero-image" src="images/ui/default-timeline.jpg" alt="timeline-picture"/>
            </div>

            <div class="profile-picture">
                <img class="profile-picture" src="images/ui/default-profile-pic.png" alt="profile-picture"/>
            </div>

            <div class="content">
                <div class="two-col-general">
                    <section class="">
                        <table class="profile-info">
                            <tr>
                                <td><span>Name</span></td>
                                <td><span>John Doe</span></td>
                            </tr>
                            <tr>
                                <td><span>Trade</span></td>
                                <td><span>Carpenter</span></td>
                            </tr>
                            <tr>
                                <td><span>Phone</span></td>
                                <td><span>+1 123 456 7890</span></td>
                            </tr>
                            <tr>
                                <td><span>Address</span></td>
                                <td><span>Brampton, ON</span></td>
                            </tr>
                            <tr>
                                <td><span>About Me</span></td>
                                <td>
                                    <p>
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro deserunt officia velit tempora voluptatem numquam. Suscipit, aliquid vitae quas accusantium nam quae, molestias earum ut ipsam quod facere obcaecati deserunt!
                                    </p>
                                </td>
                            </tr>
                        </table>
                    </section>
                    <aside class="profile-sidebar">
                        <div class="palette">
                            <h2 class="title">Want to say hello?</h2>
                            <p>
                                For now you will have to manually contact them via their phone number, if they have provided. 
                            </p><br/>
                            <p>
                                Amazing new features are coming to the website soon, which will allow you to <strong>Add Friends</strong> and <strong>Chat</strong> with them on the website. 
                            </p>
                        </div>
                    </aside>
                </div>
            </div>
        </section>
    </main>
    <?= $site_commons["site-footer"] ?>
    <?= $site_commons["body-scripts"] ?>
</body>
</html>