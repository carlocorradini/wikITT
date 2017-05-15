<?php
//Require engine PHP page
require '../common/php/engine.php';
//Start Session
session_start();
?>

<!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php if (authentication_session()) { ?>
            <title>Admin | Control Panel</title>
        <?php } else { ?>
            <title>Admin | Sign In</title>
        <?php } ?>

        <link rel="icon" href="/common/image/icon.ico" type="image/x-icon">

        <!--Frameworks-->
        <!--Pace-->
        <link rel="stylesheet" type="text/css" href="/common/framework/pace/pace.min.css"/>
        <script src="/common/framework/pace/pace.min.js" type="text/javascript"></script>
        <!--Jquery-->
        <script src="/common/framework/jquery.min.js" type="text/javascript"></script>
        <!--Semantic-UI-->
        <link rel="stylesheet" type="text/css" href="/common/framework/semantic-UI/semantic.min.css"/>
        <script src="/common/framework/semantic-UI/semantic.min.js" type="text/javascript"></script>
    </head>
    <body>
        <div class="wrapper">
            <!--#include virtual="/common/component/header.html" -->
            <?php
            if (authentication_session()) {
            ?>
            <div class="ui card">
                <div class="image">
                    <img src="https://cdn4.iconfinder.com/data/icons/small-n-flat/24/terminal-512.png" alt="administrator">
                </div>
                <div class="content">
                    <div class="header"><?php echo getUsername();?></div>
                    <div class="meta">
                        <span class="date">Creato il <?php echo getAdminCreationDateTime();?></span>
                    </div>
                    <i class="video icon"></i> <?php echo getAdminVideoCount();?>
                    <i class="user icon"></i> <?php echo getAdminUserCount()?>
                </div>
            </div>
            <?php } else {
                require 'sign-in.html';
            }
            ?>
        </div>
        <!--#include virtual="/common/component/footer.html" -->
    </body>
</html>
