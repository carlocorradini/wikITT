<!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Costruzioni</title>
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
            #header .nav-container ul li:nth-child(5) a,
            #header .nav-container ul li:nth-child(5) a:before {
                background: #a5673f;
                background: linear-gradient(to bottom right, #a5673f, #d8956a);
                background: -webkit-linear-gradient(left top, #a5673f, #d8956a);
                background: -moz-linear-gradient(bottom right, #a5673f, #d8956a);
                background: -o-linear-gradient(bottom right, #a5673f, #d8956a);
                color: #ffffff!important;
                border-color: #ffffff;
            }
            
            body {
                background-image: url(https://lh3.googleusercontent.com/1dEiswUYw6QJBi3zVg_NiPyywMzBONXtwqCF1HXz1xu6lb6CaKj2Dtswel8-KjqXiA=h900);
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
                    <a class="ui brown ribbon label">Presentazione</a>
                    <p><br>
                    « L'architettura è musica nello spazio, una sorta di musica congelata. »       
                    <br>
                    (Friedrich Schelling)

                    <br><br>
                    L’edilizia è l’insieme delle tecniche e delle conoscenze finalizzate alla progettazione e realizzazione di un edificio. E’ sotto il nome di edilizia che ricadono tutte le operazioni che mirano alla riparazione, alla  modifica o demolizione di una costruzione.
                    Questi brevi video ti permetteranno di comprendere meglio argomenti riguardanti materie come la topografia o la progettazione e costruzione di impianti.

                    </p>
                </div>
            -->
            <?php include $_SERVER["DOCUMENT_ROOT"]."/common/component/coming-soon.html";?>
        </div>
        <?php include $_SERVER["DOCUMENT_ROOT"]."/common/component/footer.html";?>
    </body>
</html>