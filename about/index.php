<!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>About Us</title>
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
            .container-fluid {
                font:20px/185% Verdana;
            }
            .rowStyle{
                margin-top: 1em;
                min-height: 15em;
            }
            
            .image{
                margin: auto;
                max-height: 70%;
                max-width: 80%;
                display: block;
                -webkit-transition: all 250ms ease-in-out;
                -moz-transition: all 250ms ease-in-out;
                -ms-transition: all 250ms ease-in-out;
                -o-transition: all 250ms ease-in-out;
                transition: all 250ms ease-in-out;
            }
            
            .image:hover {
                -webkit-transform: scale(1.1,1.1);
                -moz-transform: scale(1.1,1.1);
                -o-transform: scale(1.1,1.1);
                -ms-transform: scale(1.1,1.1);
                transform: scale(1.05,1.05);
                opacity: 0.9;
            }
            
            .banner{
                display: block;
                margin-right: -1em;
                min-height: 100%;
                max-width: 100%;
            }
        </style>
    </head>
    <body>
        <div class="wrapper">
            <?php include $_SERVER["DOCUMENT_ROOT"]."/common/component/header.html";?>
            <div class="container-fluid">  
                <br>
                <img src="banner.jpeg" class="banner">
                <div class="row rowStyle">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-6 text-left">                 
                        <div class="col-sm-1"></div>
                        <div class="col-sm-10"> 
                            <h2 style="text-align: center;"> Cos'è WikITT? </h2>
                            <br/>
                            <p>WikITT è un progetto nato dall’idea di alcuni professori dell’istituto ITT Buonarroti – Pozzo di Trento e sviluppato dalla classe 5A (A.S. 2016/17) 
                                dell’indirizzo informatico sin dalle sue prime fasi.
                                L’intento di questo progetto è quello di mettere a disposizione una nuova piattaforma dove poter condividere dei brevi video didattici, con lo scopo 
                                di creare un vero e proprio portale web utile agli studenti di tutti gli indirizzi formativi dell’istituto per imparare e/o ripassare concetti relativi 
                                al programma scolastico.
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-3"></div>
                </div>

                <div class="row rowStyle">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-6 text-left">                 
                        <div class="col-sm-1"></div>
                        <div class="col-sm-10">
                            <h2 style="text-align: center;"> Chi siamo? </h2>
                            <br/>
                            <p>Siamo dei ragazzi di 18-21 anni, abbiamo hobby e interessi diversi ma siamo accumunati dalla stessa passione verso il mondo della tecnologia che,
                                fin da bambini, ci ha sempre affascinati.
                                I nostri professori ci hanno spinto a lavorare ad un progetto comune che ci ha portati a formare due gruppi, uno mirato alla creazione dei video
                                che potete trovare all'interno del sito, mentre l'altro gruppo orientato verso la creazione della piattaforma WikITT.
                            </p>
                        </div>
                        <div class="col-sm-1"></div>
                    </div>
                    <div class="col-sm-3"></div>
                </div>

                <div class="row rowStyle">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-8">
                        <h2 style="text-align: center;"> I gruppi </h2>
                        <br/>
                        <div class="col-sm-6">
                            <img src="/common/image/gruppo_video.jpg" class="image" alt="gruppo_grafica">
                            <br/>
                            <h3 style="text-align: center;">Gruppo Video</h3>                            
                        </div>

                        <div class="col-sm-6"> 
                            <img src="/common/image/gruppo_prog.jpg" class="image" alt="gruppo_programmazione">
                            <br/>
                            <h3 style="text-align: center;">Gruppo Programmazione</h3>
                        </div>
                    </div>
                    <div class="col-sm-2"></div>
                </div>
            </div>
        </div>
        <?php include $_SERVER["DOCUMENT_ROOT"]."/common/component/footer.html";?>
    </body>
</html>
