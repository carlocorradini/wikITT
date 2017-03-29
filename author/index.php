<!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Chiamala come vuoi te</title>
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
        <!--Bootstrap-->
        <link rel="stylesheet" type="text/css" href="/common/framework/bootstrap.min.css"/>
        <!--END Framweworks-->

        <style>
            .ui.raised.card .header {
                font-family: Lato,'Helvetica Neue',Arial,Helvetica,sans-serif;
                border: none;
                box-shadow: none;
                -webkit-box-shadow: none;
                -moz-box-shadow: none;
                border-radius: 0;
                -webkit-border-radius: 0;
                -moz-border-radius: 0;
                background-color: transparent;
                height: auto;
            }
            .ui.raised.card {
                display: block;
                margin: 5% auto;
            }
            body {
                background-image: url(/author/wallpaper_author.png);
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
        <div class="contenuto">
            <!--#include virtual="/common/component/header.html" -->

            <div class="ui raised card">
                <div class="content">
                    <div class="header">Stefano Perenzoni</div>
                    <div class="description">5 INA</div>
                    <div class="meta">
                        <span class="category">Classe</span>
                    </div>
                    <div class="description">2016/2017</div>
                    <div class="meta">
                        <span class="category">Anno Scolastico</span>
                    </div>
                    <div class="description">
                        <p>"Quando un uomo siede un'ora in compagnia di una bella ragazza, sembra sia passato un minuto. Ma fatelo sedere su una stufa per un minuto e gli sembrerà più lungo di qualsiasi ora. Questa è la relatività."<p>
                        <p>(Albert Einstein)<p>
                    </div>
                </div>
                <div class="extra content">
                    <div class="left floated author">
                        <i class="film icon"></i>
                        7
                    </div>
                    <div class="right floated author">
                        <img class="ui avatar image" src="https://semantic-ui.com/images/avatar2/large/matthew.png">
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>