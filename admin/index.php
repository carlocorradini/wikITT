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
            <title>Admin | Pannello di Controllo</title>
        <?php } else { ?>
            <title>Admin | Accedi</title>
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
                //session_destroy();
            ?>
            <style>
                #admin-profile {
                    width: 450px;
                    max-width: 100%;
                    margin: 25px auto;
                }
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
                                        type: 'minLength[<?php echo $min_password_length?>]',
                                        prompt: 'Lunghezza vecchia password minimo \{ruleValue}\ caratteri'
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
                                        type: 'minLength[<?php echo $min_password_length?>]',
                                        prompt: 'Lunghezza nuova password minimo \{ruleValue}\ caratteri'
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
                    $.ajax({
                        type: 'POST',
                        url: url,
                        data: {
                            type: 2,
                            old_password: $(form).find('input[name=old_password]').val(),
                            new_password: $(form).find('input[name=new_password]').val()
                        },
                        success: function (data) {
                            $(form).removeClass("loading");
                            var message = $("#form-change-password").find(".ui.bottom.attached.message");
                            if (data.status) {
                                $(form).trigger("reset");
                                $(message).removeClass("error").addClass("success");
                                $(message).find("i").removeClass().addClass("checkmark icon");
                                $(message).find("span").html(data.message);
                            } else {
                                $(message).removeClass("success").addClass("error");
                                $(message).find("i").removeClass().addClass("remove icon");
                                $(message).find("span").html(data.message);
                            }
                            console.info("[AUTHENTICATION]: " + data.message);
                        }, error: function (jqXHR, status, error) {
                            console.error("[AUTHENTICATION]: " + error);
                        }
                    });
                    return false;
                }
            </script>
            <div class="ui labeled button" tabindex="0">
                <div class="ui red button">
                    <i class="power icon"></i>
                </div>
                <a class="ui basic red left pointing label">
                    Sign out
                </a>
            </div>
            <div style="padding: 10px 10px 0 10px;">
                <div class="ui centered card" id="admin-profile">
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
                        <form class="ui attached form segment large" action="#">
                            <h3 class="ui horizontal divider header">
                                <i class="shield icon"></i>
                                Admin | Cambio Password
                            </h3>
                            <div class="field">
                                <label>Vecchia Password</label>
                                <div class="ui left icon fluid input">
                                    <input type="password" name="old_password" placeholder="Vecchia Password" autocomplete="off" required>
                                    <i class="lock icon"></i>
                                </div>
                            </div>
                            <div class="field">
                                <label>Nuova Password</label>
                                <div class="ui left icon fluid input">
                                    <input type="password" name="new_password" placeholder="Nuova Password" autocomplete="off" required>
                                    <i class="lock icon"></i>
                                </div>
                            </div>
                            <div class="field">
                                <label>Ripeti nuova Password</label>
                                <div class="ui left icon fluid input">
                                    <input type="password" name="new_password_retype" placeholder="Ripeti Nuova Password" autocomplete="off" required>
                                    <i class="lock icon"></i>
                                </div>
                            </div>
                            <button class="ui button large purple fluid" type="submit">Submit</button>
                            <div class="ui error message"></div>
                        </form>
                        <div class="ui large bottom attached message">
                            <i class="send icon"></i>
                            <span>Inserisci i dati richiesti per cambiare password</span>
                        </div>
                    </div>
                    <div class="ui bottom attached large blue button" id="change-password">
                        <i class="lock icon"></i>
                        Cambia Password
                    </div>
                </div>
            </div>
            <?php } else { ?>
                <style>
                    #sign-in {
                        width: 600px;
                        max-width: 100%;
                        margin: 25px auto;
                        padding: 10px;
                    }
                    body {
                        background-image: url(https://s-media-cache-ak0.pinimg.com/originals/03/95/6f/03956fed74537b3d7b0858e9a814748d.jpg);
                        background-position: center center;
                        background-repeat: no-repeat;
                        background-attachment: fixed;
                        background-size: cover;
                        -webkit-background-size: cover;
                        -moz-background-size: cover;
                        -o-background-size: cover;
                        background-color: #ffffff;
                    }
                </style>
                <script>
                    $(document).ready(function () {
                        var form = $("#sign-in").find("form");
                        $(form).form({
                            fields: {
                                username: {
                                    identifier: 'username',
                                    rules: [
                                        {
                                            type: 'empty',
                                            prompt: 'Username Obbligatorio'
                                        }
                                    ]
                                },
                                password: {
                                    identifier: 'password',
                                    rules: [
                                        {
                                            type: 'empty',
                                            prompt: 'Password Obbligatoria'
                                        },
                                        {
                                            type: 'minLength[<?php echo $min_password_length?>]',
                                            prompt: 'Lunghezza vecchia password minimo \{ruleValue}\ caratteri'
                                        }
                                    ]
                                }
                            },
                            onSuccess: function () {
                                return submitSignInForm(form);
                            }
                        });
                    });
                    function submitSignInForm(form) {
                        //Send Data for Validation
                        $(form).addClass("loading");
                        var url = "/common/php/administrator.php";
                        $.ajax({
                            type: 'POST',
                            url: url,
                            data: {
                                type: 1,
                                username: $(form).find('input[name=username]').val(),
                                password: $(form).find('input[name=password]').val()
                            },
                            success: function (data) {
                                $(form).removeClass("loading");
                                var message = $("#message-sign-in");
                                if (data.status) {
                                    $(message).removeClass("error").addClass("success");
                                    $(message).find("i").removeClass().addClass("checkmark icon");
                                    $(message).find("span").html(data.message + ' - Redirecting in <span></span>');
                                    redirect(3, $("#message-sign-in span span"), window.location.href);
                                } else {
                                    $(message).removeClass("success").addClass("error");
                                    $(message).find("i").removeClass().addClass("remove icon");
                                    $(message).find("span").html(data.message);
                                }
                                console.info("[AUTHENTICATION]: " + data.message);
                            }, error: function (jqXHR, status, error) {
                                console.error("[AUTHENTICATION]: " + error);
                            }
                        });
                        return false;
                    }
                    function redirect(timeOut, component, target) {
                        $(component).html(timeOut);
                        setTimeout(countDown, 1000);
                        function countDown() {
                            timeOut--;
                            if (timeOut > 0)
                                setTimeout(countDown, 1000);
                            else
                                window.location.href = target;
                            $(component).html(timeOut);
                        }
                    }
                </script>
                <div id="sign-in">
                    <form class="ui attached form segment large" action="#">
                        <h1 class="ui horizontal divider header">
                            <i class="shield icon"></i>
                            Admin | Accedi
                        </h1>
                        <div class="field">
                            <label>Username</label>
                            <div class="ui left icon input">
                                <input type="text" name="username" placeholder="Username" autocomplete="off" required>
                                <i class="user icon"></i>
                            </div>
                        </div>
                        <div class="field">
                            <label>Password</label>
                            <div class="ui left icon input">
                                <input type="password" name="password" placeholder="Password" autocomplete="off" required>
                                <i class="lock icon"></i>
                            </div>
                        </div>
                        <button class="ui animated fade teal fluid big button" type="submit" tabindex="0">
                            <div class="visible content">Submit</div>
                            <div class="hidden content">
                                <i class="send icon"></i>
                            </div>
                        </button>
                        <div class="ui error message"></div>
                    </form>
                    <div id="message-sign-in" class="ui large bottom attached message">
                        <i class="send icon"></i>
                        <span>Inserisci le credenziali per essere autenticato</span>
                    </div>
                </div>
            <?php }?>
        </div>
    </body>
</html>
