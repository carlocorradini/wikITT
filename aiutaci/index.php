<!DOCTYPE html>
<html>
    <head>
        <title>Aiutaci a migliorare</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
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
        
        <!--Custom-->
        <link rel="stylesheet" type="text/css" href="/common/style/style.css"/>
        <script src="/common/script/script.js" type="text/javascript"></script>
        <style>

            
            .image{
                padding-top: 10em;
                max-width: 100%;
                -webkit-transition: all 250ms ease-in-out;
                -moz-transition: all 250ms ease-in-out;
                -ms-transition: all 250ms ease-in-out;
                -o-transition: all 250ms ease-in-out;
                transition: all 250ms ease-in-out;
                max-height: 80%;
                max-width: 80%;
            }
            
            .testo{
                padding-top: 14em;
            }
            
            h1{
                font-size: 3.9em;

            }
            
            p{
                font-size: 2em;
                color: grey;
            }
            
            .navbar .navbar-nav {
                display: inline-block;
                float: none;
                vertical-align: top;
            }
            
            .image:hover {
                -webkit-transform: scale(1.1,1.1);
                -moz-transform: scale(1.1,1.1);
                -o-transform: scale(1.1,1.1);
                -ms-transform: scale(1.1,1.1);
                transform: scale(1.05,1.05);
                opacity: 0.9;
            }
            
            /* Dropdown Button */
            .dropbtn {
                background-color: #4dc247;
                color: white;
                padding: 16px;
                font-size: 16px;
                border: none;
                cursor: pointer;
            }

            .dropdown-content {
                display: none;
                position: absolute;
                background-color: #f9f9f9;
                min-width: 160px;
                box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
                z-index: 1;
            }

            .dropdown-content a {
                color: grey;
                padding: 12px 16px;
                text-decoration: none;
                display: block;
            }

            .dropdown-content a:hover {background-color: #f1f1f1}

            .dropdown:hover .dropdown-content {
                display: block;
            }

            .dropdown:hover .dropbtn {
                background-color: #3e8e41;
            }   
            
            .contenuto{
                height: 77%;
            }
        </style>
    </head>
    <body>
        <div class="wrapper">
            <?php include $_SERVER["DOCUMENT_ROOT"]."/common/component/header.html";?>
            <div class="container-fluid contenuto">
                <div class="row">
                    <div class="col-sm-12">
                        <br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-1">
                    </div>
                    <div class="col-sm-6">
                        <img src="multi-platform.png" class="image" alt="progetto">
                    </div>
                    <div class="col-sm-4">
                        <div class="testo">
                            <h1>Diventa anche tu parte della community WikITT!</h1>
                            <p>Scarica subito le slide e l'intro del video e inizia anche tu a partecipare attivamente alla creazione di nuovi contenuti</p>

                            <div class="dropdown">
                                <button class="dropbtn">Scegli cosa scaricare <span class="caret"></span></button>
                                <div class="dropdown-content">
                                    <a href="http://download1483.mediafireuserdownload.com/cdqj584p3hfg/026741z54d8p7z6/Sfondo_Slide.jpg">Slide</a>
                                    <a href="http://download1271.mediafireuserdownload.com/x1g1y7ldapig/cp3t3a1cuek5m2o/Intro_Video.mp4">Intro</a>
                                    <a href="http://download1507.mediafireuserdownload.com/a40oc5uoyc8g/rrb2n66bqu408oa/italy.mp3">Guida alla realizzazione dei video</a>
                                    <a href="http://download1507.mediafireuserdownload.com/a40oc5uoyc8g/rrb2n66bqu408oa/italy.mp3">Guida al caricamento dei video</a>
                                </div>
                            </div>
                        </div>                
                    </div>
                    <div class="col-sm-1">
                    </div>
                </div>           
            </div>
        </div>
        <?php include $_SERVER["DOCUMENT_ROOT"]."/common/component/footer.html";?>
    </body>
</html>
