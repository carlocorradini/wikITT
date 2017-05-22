<!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Meccanica</title>
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
        
        <!--Custom-->
        <link rel="stylesheet" type="text/css" href="/common/style/style.css"/>
        <script src="/common/script/script.js" type="text/javascript"></script>
        <style>
            /*Pere*/
            #header .nav-container ul li:nth-child(2) a,
            #header .nav-container ul li:nth-child(2) a:before {
                background: #21ba45;
                background: linear-gradient(to bottom right, #21ba45, #48f271);
                background: -webkit-linear-gradient(left top, #21ba45, #48f271);
                background: -moz-linear-gradient(bottom right, #21ba45, #48f271);
                background: -o-linear-gradient(bottom right, #21ba45, #48f271);
                color: #ffffff!important;
                border-color: #ffffff;
            }
            
            body {
                background-image: url(http://www.rivistainnovare.com/wp-content/uploads/2010/12/ScattoZincaturaMeccanicaBianca.jpg);
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
        <div class="wrapper">
            <?php include $_SERVER["DOCUMENT_ROOT"]."/common/component/header.html";?>
            <!--
                <div class="ui raised segment" style="margin-bottom: 30px">
                    <a class="ui green ribbon label">Presentazione</a>
                    <p><br>
                    « La Meccanica è il paradiso delle scienze matematiche, perché con quella si viene al frutto matematico. » 
                    <br>
                    (Leonardo da Vinci)

                    <br><br>
                    In fisica con il termine meccanica si indica qualsiasi teoria che si occupi del movimento dei corpi, tradizionalmente essa viene divisa in tre branche principali: la cinematica, la dinamica e la statica.
                    La meccanica non si limita alla parte pratica ma comprende anche lo studio dei principi che regolano le forze che controllano il mondo.

                    </p>
                </div>
            -->
            <?php include $_SERVER["DOCUMENT_ROOT"]."/common/component/coming-soon.html";?>
        </div>
        <?php include $_SERVER["DOCUMENT_ROOT"]."/common/component/footer.html";?>
    </body>
</html>
