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
        <?php if (authentication_session()) {?>
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
            <style>
                #form-change-password {
                    display: none;
                }
            </style>
            <script>
                $(document).ready(function() {
                    $('.ui.checkbox').checkbox();
                    $("#change-password").on("click", function() {
                        $("#form-change-password").transition("swing down");
                    });
                    $("#form-change-password form").form({
                        fields: {
                            old_password: {
                                identifier: 'old_password',
                                rules: [
                                    {
                                        type: 'empty',
                                        prompt: 'Vecchia password obbligatoria'
                                    },
                                    {
                                        type: 'minLength[6]',
                                        prompt: 'Lunghezza vecchia password minimo 6 caratteri'
                                    }
                                ]
                            },
                            new_password: {
                                identifier: 'new_password',
                                rules: [
                                    {
                                        type: 'empty',
                                        prompt: 'Nuova password obbligatoria'
                                    },
                                    {
                                        type: 'minLength[6]',
                                        prompt: 'Lunghezza nuova password minimo 6 caratteri'
                                    },
                                    {
                                        type: 'match[new_password_retype]',
                                        prompt: 'Le password devono combaciare'
                                    }
                                ]
                            },
                            new_password_retype: {
                                identifier: 'new_password_retype',
                                rules: [
                                    {
                                        type: 'empty',
                                        prompt: 'Nuova password obbligatoria'
                                    },
                                    {
                                        type: 'match[new_password]',
                                        prompt: 'Le password devono combaciare'
                                    }
                                ]
                            }
                        },
                        onSuccess: function () {
                            return submitChangePasswordForm($("#form-change-password form"));
                        }
                    });
                });
                function submitChangePasswordForm(form) {
                    //Send Data for Validation
                    $(form).addClass("loading");
                    var url = "/common/php/administrator.php";
                    /*$.ajax({
                        type: 'POST',
                        url: url,
                        data: {
                            type: 1,
                            username: username,
                            password: password
                        },
                        success: function (data) {
                            $(form).removeClass("loading");
                            var message = $("#message");
                            if (data.status) {
                                $(message).removeClass("error").addClass("success");
                                $(message).find("i").removeClass().addClass("checkmark icon");
                                $(message).find("span").html(data.message + ' - Redirecting in <span id="redirect-timeout"></span>');
                                redirect(3, $("#message #redirect-timeout"), "index.php");
                            } else {
                                $(message).removeClass("success").addClass("error");
                                $(message).find("i").removeClass().addClass("remove icon");
                                $(message).find("span").html(data.message);
                            }
                            console.info("[AUTHENTICATION]: " + data.message);
                        }, error: function (jqXHR, status, error) {
                            console.error("[AUTHENTICATION]: " + error);
                        }
                    });*/
                    return false;
                }
            </script>
            <div class="ui centered card">
                <div class="content">
                    <img class="right floated mini ui image" src="/common/image/profile/terminal.png" alt="administrator">
                    <div class="header"><?php echo getUsername();?></div>
                    <div class="meta">
                        <span class="date">Creato il <?php echo getAdminCreationDate();?> alle <?php echo getAdminCreationTime();?></span>
                    </div>
                    <div class="description">
                        <span class="right floated">
                            <i class="user icon"></i>
                            <?php echo getAdminUserCount()?> Autori
                        </span>
                        <i class="video icon"></i>
                        <?php echo getAdminVideoCount();?> Video
                    </div>
                </div>
                <div class="extra content">
                    <div class="ui two buttons large">
                        <div class="ui orange inverted button">
                            <i class="add icon"></i>
                            Video
                        </div>
                        <div class="ui green inverted button">
                            <i class="add icon"></i>
                            Autore
                        </div>
                    </div>
                </div>
                <div class="extra content" id="form-change-password">
                    <form class="ui form" action="#">
                        <div class="field">
                            <div class="ui left icon fluid input">
                                <input type="password" name="old_password" placeholder="Vecchia Password" autocomplete="off" required>
                                <i class="lock icon"></i>
                            </div>
                        </div>
                        <div class="field">
                            <div class="ui left icon fluid input">
                                <input type="password" name="new_password" placeholder="Nuova Password" autocomplete="off" required>
                                <i class="lock icon"></i>
                            </div>
                        </div>
                        <div class="field">
                            <div class="ui left icon fluid input">
                                <input type="password" name="new_password_retype" placeholder="Ripeti Nuova Password" autocomplete="off" required>
                                <i class="lock icon"></i>
                            </div>
                        </div>
                        <button class="ui button" type="submit">Submit</button>
                        <div class="ui error message"></div>
                    </form>
                </div>
                <div class="ui bottom attached large blue button" id="change-password">
                    <i class="lock icon"></i>
                    Cambia Password
                </div>
            </div>
            <?php } else {
                require 'sign-in.html';
            }
            ?>
        </div>
    </body>
</html>
