<!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Admin | Sign In</title>
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
    </head>
    <body>
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
                                    type: 'minLength[6]',
                                    prompt: 'Lunghezza password minimo 6 caratteri'
                                }
                            ]
                        }
                    },
                    onSuccess: function () {
                        return submitForm(form);
                    }
                });
            });
            function submitForm(form) {
                //Send Data for Validation
                $(form).addClass("loading");
                var url = "/common/php/admin-authentication.php";
                $.ajax({
                    type: 'POST',
                    url: url,
                    data: $(form).serialize(),
                    success: function (data) {
                        $(form).removeClass("loading");
                        var message = $("#message");
                        if (data.status) {
                            $(message).removeClass("error").addClass("success");
                            $(message).find("i").removeClass().addClass("checkmark icon");
                            $(message).find("span").html(data.message+" - Redirecting...");
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
        <div class="wrapper">
            <!--#include virtual="/common/component/header.html" -->
            <div id="sign-in">
                <form class="ui attached form segment big" action="#">
                    <h1 class="ui horizontal divider header">
                        <i class="shield icon"></i>
                        Admin | Sign In
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
                <div id="message" class="ui large bottom attached message">
                    <i class="send icon"></i>
                    <span>Inserisci le credenziali per essere autenticato</span>
                </div>
            </div>
        </div>
    </body>
</html>
