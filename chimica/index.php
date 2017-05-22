<!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Chimica</title>
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
            #header .nav-container ul li:nth-child(3) a,
            #header .nav-container ul li:nth-child(3) a:before {
                background: #db2828;
                background: linear-gradient(to bottom right, #db2828, #ff6363);
                background: -webkit-linear-gradient(left top, #db2828, #ff6363);
                background: -moz-linear-gradient(bottom right, #db2828, #ff6363);
                background: -o-linear-gradient(bottom right, #db2828, #ff6363);
                color: #ffffff!important;
                border-color: #ffffff;
            }
            
            body {
                background-image: url(https://image.shutterstock.com/z/stock-vector-back-to-school-pen-sketch-seamless-background-physics-and-chemistry-can-be-used-for-wallpaper-150967424.jpg);
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
                    <a class="ui red ribbon label">Presentazione</a>
                    <p><br>
                    « Nulla si crea, nulla si distrugge, ma tutto si trasforma. »
                    <br>
                    (Antoine-Laurent de Lavoisier)
                    <br><br>
                    La chimica è la scienza che studia la composizione della materia ed il suo comportamento in base a tale composizione, viene spesso definita anche “central science” perché connette tra loro tutte le altre scienze naturali come l’astronomia, la biologia o la geologia.
                    Con questi brevi video avrai la possibilità di approfondire i vari legami presenti tra gli elementi in natura e le loro proprietà peculiari. 

                    </p>
                </div>
            -->
            <?php include $_SERVER["DOCUMENT_ROOT"]."/common/component/coming-soon.html";?>
        </div>
        <?php include $_SERVER["DOCUMENT_ROOT"]."/common/component/footer.html";?>
    </body>
</html>