
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
            
            /*Video Navigation*/
            .video-nav {
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
                .video-content {
                    padding: 0.5em;
                }
                .video-nav {
                    padding-right: 0.25em;
                }
                .video-content {
                    padding-left: 0.25em;
                }
            }
            @media screen and (max-width: 700px) {
                .video-nav,
                .video-content {
                    padding: 0.25em;
                }
                .video-nav {
                    width: 40%;
                    right: 0;
                }
                .video-content {
                    width: 100%;
                    left: 0;
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
                setSameSize();
            });
            $(window).resize(function() {
                setSameSize();
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
            function setSameSize() {
                $(".video-nav .ui.vertical.menu").css({
                    "height": $(".plyr").height()
                });
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
                    $videoTitle = query("SELECT Titolo FROM video WHERE VideoID='$vID' LIMIT 1");
                
                    if(!isset($vID) || $vID === "" || mysqli_num_rows($videoTitle) == 0) {?>
                        <img src="http://www.progettotorino.it/wp-content/uploads/2016/05/ICT-graphic.jpg" alt="informatica" style="width: 100%; height: 100%;"/>
                    <?php } else {?>
                        <div data-type="youtube" data-video-id="<?php echo $vID;?>"></div>
                        <h1><?php echo mysqli_fetch_array($videoTitle)["Titolo"];?></h1>
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
                        $result = query("SELECT Titolo,VideoID FROM video ORDER BY Titolo;");
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_array($result)) {
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
