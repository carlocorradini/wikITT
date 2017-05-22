<!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Supporto</title>
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
        <!--END Framweworks-->
        
        <style>
            .banner { 
                position: relative;
                width: 100%;
                text-align: center;
                vertical-align: middle;
                max-width: 100%;
            }
            .banner img {
                width: 100%;
                height: 200%;
            }
            .help {
                position: absolute;
                top: 10%;
                width: 100%;
                color: #fff;
            }
            #help-message {
                position: relative;
                display: block;
                width: 600px;
                max-width: 100%;
                margin: 1em auto 0 auto;
                padding: 1em;
                text-align: center;
                vertical-align: middle;
            }
            .thanks {
                padding-top: 1em;
                color: #f44336;
            }
        </style>
    </head>
    <body style="overflow: auto;">
        <div class="wrapper">
            <?php include $_SERVER["DOCUMENT_ROOT"]."/common/component/header.html";?>
            <div class="banner">
                <img src="banner.jpg" alt="banner"/>
                <h1 class="help">CONTATTACI</h1>
            </div>
            <div id="help-message">
                <div class="ui blue raised segment center aligned">
                    <h2>Hai riscontrato qualche problema?</h2><br>
                    <p>Inviaci una e-mail a <span data-tooltip="Clicca per inviare"><a href="mailto:prova@gmail.com?Subject=Problema%20nel%20sito" target="_top">questo indirizzo</a></span>.</p>
                    <p>Specifica l'errore, dove si verifica e sotto quali circostanze.</p>
                    <h1 class='thanks'>&#x1f64f; Grazie! &#x1f64f;</h1>
                </div>
            </div>
        </div>
        <?php include $_SERVER["DOCUMENT_ROOT"]."/common/component/footer.html";?>
    </body>
</html>
