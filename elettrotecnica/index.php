<!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Elettrotecnica</title>
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
            #header .nav-container ul li:nth-child(4) a,
            #header .nav-container ul li:nth-child(4) a:before {
                background: #f2711c;
                background: linear-gradient(to bottom right, #f2711c, #fc934e);
                background: -webkit-linear-gradient(left top, #f2711c, #fc934e);
                background: -moz-linear-gradient(bottom right, #f2711c, #fc934e);
                background: -o-linear-gradient(bottom right, #f2711c, #fc934e);
                color: #ffffff!important;
                border-color: #ffffff;
            }
            
            body {
                background-image: url(http://cdn.wallpapersafari.com/62/73/cLYFn6.jpg);
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
                    <a class="ui orange ribbon label">Presentazione</a>
                    <p><br>
                    « L’elettronica è il lego dei grandi. »
                    <br>
                    (Anonimo)

                    <br><br>
                    L’elettronica è la scienza e la tecnica che studia la propagazione degli elettroni nel vuoto o nella materia. Inizialmente l’elettronica era solo una branca dell’elettrotecnica ma, nel corso degl’anni, è andata a svilupparsi fino a diventare una discplina a se stante.
                    Grazie a questi video potrai approfondire argomenti riguardanti per esempio lo studio di impianti, la produzione di energia oppure la domotica.

                    </p>
                </div>
            -->
            <?php include $_SERVER["DOCUMENT_ROOT"]."/common/component/coming-soon.html";?>
        </div>
        <?php include $_SERVER["DOCUMENT_ROOT"]."/common/component/footer.html";?>
    </body>
</html>