
<!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Informatica</title>
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
        
        
        <!--Plyr-->
        <link rel="stylesheet" type="text/css" href="https://cdn.plyr.io/2.0.7/plyr.css"/>
        <script src="https://cdn.plyr.io/2.0.7/plyr.js" type="text/javascript"></script>
        <!--END Framweworks-->
        
        <!--Custom-->
        <link rel="stylesheet" type="text/css" href="/common/style/style.css"/>
        <script src="/common/script/script.js" type="text/javascript"></script>
        <style>
            /*Pere*/
            .header .nav-container ul li:nth-child(1) a,
            .header .nav-container ul li:nth-child(1) a:before {
                background: #2185d0;
                background: linear-gradient(to bottom right, #2185d0, #59b0f2);
                background: -webkit-linear-gradient(left top, #2185d0, #59b0f2);
                background: -moz-linear-gradient(bottom right, #2185d0, #59b0f2);
                background: -o-linear-gradient(bottom right, #2185d0, #59b0f2);
                color: #ffffff!important;
                border-color: #ffffff;
            }
            
            /*Materia Colore*/
            .font.informatica { color: #2185d0!important;}
            .font.meccanica { color: #21ba45!important;}
            .font.chimica { color: #db2828!important;}
            .font.elettrotecnica { color: #f2711c!important;}
            .font.costruzioni { color: #a5673f!important;}
            
            /*General*/
            .video-nav,
            .video-content {
                position: relative;
                padding: 1em;
                min-height: 1px;
                float: left;
                transition: padding 0.5s;
                -webkit-transition: padding 0.5s;
                -moz-transition: padding 0.5s;
            }
            
            #video {
                padding: 0 10%;
                background-color: rgba(0,0,0,0.9);
                transition: padding 0.5s linear;
                -webkit-transition: padding 0.5s linear;
                -moz-transition: padding 0.5s linear;
            }
            #video-description {
                width: 100%;
                min-height: 100px;
                margin-top: 1em;
                padding: 1em;
                border-radius: 3px;
                -webkit-border-radius: 3px;
                -moz-border-radius: 3px;
                box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
                -webkit-box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
                -moz-box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
            }
            
            /*Video Navigation*/
            .video-nav {
                position: absolute;
                bottom: 0;
                top: 70px;
                width: 20%;
                right: 80%;
                padding-right: 0.5em;
            }
            .video-nav .ui.vertical.menu {
                width: 100%;
                height: 100%;
                overflow-y: auto;
            }
            /*Video Container*/
            .video-content {
                width: 80%;
                left: 20%;
                padding-left: 0.5em;
            }
            @media screen and (max-width: 1000px) {
                .video-nav,
                .video-content { padding: 0.5em;}
                .video-nav { padding-right: 0.25em;}
                .video-content { padding-left: 0.25em;}
                #video { padding: 0;}
            }
            @media screen and (max-width: 700px) {
                .video-nav,
                .video-content { padding: 0.25em;}
                .video-nav {
                    position: relative;
                    width: 40%;
                    right: 0;
                    bottom: auto;
                    top: auto;
                }
                .video-content {
                    width: 100%;
                    left: 0;
                }
                #video { padding: 0;}
                #video-description {
                    position: absolute;
                    width: 60%;
                    left: 40%;
                    margin-top: 0.5em;
                    padding: 0.5em;
                }
            }
            
            /*Scrollbar*/
            .scrollbar::-webkit-scrollbar-track{
                background-color: #F5F5F5;
                -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
                -moz-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
            }
            .scrollbar::-webkit-scrollbar{
                width: 6px;
                background-color: #F5F5F5;
            }
            .scrollbar.informatica::-webkit-scrollbar-thumb{ background-color: #2185d0;}
            .scrollbar.meccanica::-webkit-scrollbar-thumb{ background-color: #21ba45;}
            .scrollbar.chimica::-webkit-scrollbar-thumb{ background-color: #db2828;}
            .scrollbar.elettrotecnica::-webkit-scrollbar-thumb{ background-color: #f2711c;}
            .scrollbar.costruzioni::-webkit-scrollbar-thumb{ background-color: #a5673f;}
        </style>
    </head>
    <body>
        <script>
            $(document).ready(function() {
                //Handle Search
                $(".video-nav input:first-of-type").on("keyup", function() {
                    search($(this).val().toUpperCase());
                });
            });
            
            function search(query) {
                var items = $(".video-nav").find(".item:not(.item:first)");
                var showNoFound = true;
                $(items).each(function(index, item) {
                    var iVal = $(item).text().toUpperCase();
                    if (!$(this).is("#msg")) {
                        if(iVal.indexOf(query) > -1) {
                            showNoFound = false;
                            $(item).fadeIn("fast");
                        } else
                            $(item).fadeOut("fast");
                    }
                });
                if (showNoFound)
                    $("#msg").delay(100).fadeIn("fast");
                else
                    $("#msg").hide();
            }
        </script>
        
        <?php 
            //Require engine PHP page
            require '../common/php/engine.php';
            //Vide ID
            $vID = filter_input(INPUT_GET, "v");
        ?>
        
        <div class="contenuto">
            <!--#include virtual="/common/component/header.html" -->
            <div class="video-content">
                <?php
                    $videoInfo = query("SELECT Titolo,Descrizione,DataPub FROM video WHERE VideoID='$vID' LIMIT 1");
                
                    if(!isset($vID) || $vID === "" || mysqli_num_rows($videoInfo) == 0) {?>
                        <div id="noVideo"><img src="http://www.progettotorino.it/wp-content/uploads/2016/05/ICT-graphic.jpg" alt="informatica" style="width: 100%; height: 100%;"/></div>
                    <?php } else {?>
                        <div id="video">
                            <div data-type="youtube" data-video-id="<?php echo $vID;?>"></div>
                        </div>
                        <div id="video-description">
                            <?php $vInfo = mysqli_fetch_array($videoInfo)?>
                            <div class="ui blue label" style="float: right;">
                                <i class="calendar icon"></i>
                                <?php echo $vInfo["DataPub"]?>
                            </div>
                            <h1 style="margin: 0;"><?php echo $vInfo["Titolo"];?></h1>
                            <p><?php echo $vInfo["Descrizione"];?></p>
                            <a class="ui yellow image label" href="/author/index.php?aID=1">
                                <img src="https://semantic-ui.com/images/avatar/small/christian.jpg" alt="autore"/>
                                Carlo Corradini
                                <div class="detail">4ELC</div>
                            </a>
                            <a class="ui blue image label" href="/author/index.php?aID=2>
                                <img src="https://semantic-ui.com/images/avatar/small/joe.jpg" alt="autore"/>
                                Stefano Perenzoni
                                <div class="detail">5INA</div>
                            </a>
                        </div>
                    <?php }
                ?>
            </div>
            <div class="video-nav">
                <div class="scrollbar informatica ui vertical menu">
                    <div class="item">
                        <div class="ui transparent icon input">
                            <input type="text" placeholder="Cerca...">
                            <i class="search icon"></i>
                        </div>
                    </div>
                    <div class="item" id="msg" style="display: none;">
                        Nessun video trovato
                    </div>
                    <?php
                        $videos = query("SELECT Titolo,VideoID FROM video ORDER BY Titolo;");
                        if (mysqli_num_rows($videos) > 0) {
                            while ($row = mysqli_fetch_array($videos)) {
                                if($row["VideoID"] === $vID) { ?>
                                    <a class="font informatica active item" href="index.php?v=<?php echo $row["VideoID"];?>" style="font-weight: bold;">
                                        <i class="fire icon"></i>
                                        <?php echo $row["Titolo"];?>
                                    </a>
                                <?php } else {?>
                                    <a class="item" href="index.php?v=<?php echo $row["VideoID"];?>">
                                        <?php echo $row["Titolo"];?>
                                    </a>
                                <?php }
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
        <script>plyr.setup();</script>
    </body>
</html>
