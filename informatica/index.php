
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
            /*Active*/
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
            #video-navigation,
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
            .card {
                position: relative;
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
            .card .ui.image.label { margin-top: 0.2em;}
            #msgNoFound {
                display: none;
                font-weight: bold;
                font-style: italic;
                font-size: 1.1em;
            }
            
            /*Video Navigation*/
            #video-navigation {
                position: absolute;
                bottom: 0;
                top: 70px;
                width: 20%;
                right: 80%;
                visibility: visible;
                display: block!important;
                padding-right: 0.5em;
            }
            #video-navigation .ui.vertical.menu {
                position: relative;
                width: 100%;
                height: 100%;
                overflow-y: auto;
                overflow-x: hidden;
            }
            /*XS Responsive*/
            #btnShowVideoNavigation,
            #video-navigation .close { display: none;}
            #btnShowVideoNavigation {
                width: 99%;
                margin: 0 auto;
                margin-top: 0.25em;
            }
            #video-navigation .close {
                position: fixed;
                bottom: 3px;
                right: 8px;
                width: 50px;
                height: 50px;
                vertical-align: middle;
                background-color: #ffffff;
                border: 1px solid #db2828;
                outline: 0;
                border-radius: 50px;
                -webkit-border-radius: 50px;
                -moz-border-radius: 50px;
            }
            #video-navigation .close span {
                position: relative;
                width: 32px;
                height: 32px;
                right: 16px;
                bottom: 16px;
            }
            @-moz-document url-prefix() {
                #video-navigation .close { right: 20px;}
                #video-navigation .close span { bottom: 3px;}
            }
            #video-navigation .close span:before,
            #video-navigation .close span:after {
                position: absolute;
                left: 15px;
                content: '';
                height: 33px;
                width: 2px;
                background-color: #db2828;
            }
            #video-navigation .close span:before { transform: rotate(45deg);}
            #video-navigation .close span:after { transform: rotate(-45deg);}
            /*Hover effect*/
            #video-navigation .close,
            #video-navigation .close span:before,
            #video-navigation .close span:after {
                transition: background-color ease-in-out 0.2s;
                -webkit-transition: background-color ease-in-out 0.2s;
                -moz-transition: background-color ease-in-out 0.2s;
                -o-transition: background-color ease-in-out 0.2s;
            }
            
            #video-navigation .close:hover {background-color: #db2828;}
            #video-navigation .close:hover span:before,
            #video-navigation .close:hover span:after { background-color: #ffffff;}
            
            /*Video Container*/
            .video-content {
                width: 80%;
                left: 20%;
                padding-left: 0.5em;
            }
            @media screen and (max-width: 1000px) {
                #video-navigation,
                .video-content { padding: 0.5em;}
                #video-navigation { 
                    padding-right: 0.25em;
                    padding-bottom: 1em;
                }
                .video-content { padding-left: 0.25em;}
                #video { padding: 0;}
            }
            @media screen and (max-width: 700px) {
                /*Parent Container*/
                #video-navigation,
                .video-content { padding: 0.25em;}
                #video-navigation {
                    position: relative;
                    width: 40%;
                    height: 415px;
                    right: 0;
                    bottom: auto;
                    top: auto;
                }
                .video-content {
                    width: 100%;
                    left: 0;
                }
                
                /*Video Description & Card*/
                #video-descrition {
                    position: absolute;
                    width: 60%;
                    left: 40%;
                    padding-right: 0.25em;
                }
                .card {
                    margin-top: 0.5em;
                    padding: 0.5em;
                }
            }
            /*XS Devices*/
            @media screen and (max-width: 500px) {
                #video-navigation {
                    position: fixed;
                    display: none!important;
                    width: 100%;
                    height: 100%;
                    padding: 0;
                    top: 0;
                    z-index: 100;
                }
                #video-descrition {
                    position: relative;
                    width: 100%;
                    left: 0;
                    padding: 0;
                }
                #btnShowVideoNavigation,
                #video-navigation.transition.visible .close { display: block;}
            }
            
            /*Scrollbar*/
            .scrollbar.hidden { overflow: hidden; display: block!important;}
            .scrollbar::-webkit-scrollbar-track{
                background-color: #F5F5F5;
                -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
                -moz-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
            }
            .scrollbar::-webkit-scrollbar{
                width: 6px;
                height: 6px;
                background-color: #F5F5F5;
            }
            .scrollbar.informatica::-webkit-scrollbar-thumb{ background-color: #2185d0;}
            .scrollbar.meccanica::-webkit-scrollbar-thumb{ background-color: #21ba45;}
            .scrollbar.chimica::-webkit-scrollbar-thumb{ background-color: #db2828;}
            .scrollbar.elettrotecnica::-webkit-scrollbar-thumb{ background-color: #f2711c;}
            .scrollbar.costruzioni::-webkit-scrollbar-thumb{ background-color: #a5673f;}
        
            
            #btnShowVideoNavigation {
                background: linear-gradient(124deg, #ff2400, #e81d1d, #e8b71d, #e3e81d, #1de840, #1ddde8, #2185d0, #dd00f3, #dd00f3);
                background-size: 1800% 1800%;
                -webkit-animation: rainbow 18s ease infinite;
                -moz-animation: rainbow 18s ease infinite;
                -o-animation: rainbow 18s ease infinite;
                animation: rainbow 18s ease infinite;
            }
            @-webkit-keyframes rainbow {
                0%{background-position:0% 82%}
                50%{background-position:100% 19%}
                100%{background-position:0% 82%}
            }
            @-moz-keyframes rainbow {
                0%{background-position:0% 82%}
                50%{background-position:100% 19%}
                100%{background-position:0% 82%}
            }
            @-o-keyframes rainbow {
                0%{background-position:0% 82%}
                50%{background-position:100% 19%}
                100%{background-position:0% 82%}
            }
            @keyframes rainbow {
                0%{background-position:0% 82%}
                50%{background-position:100% 19%}
                100%{background-position:0% 82%}
            }
        </style>
    </head>
    <body>
        <script>
            $(document).ready(function() {
                //Handle Search
                $("#video-navigation input:first-of-type").on("keyup", function() {
                    search($(this).val().toUpperCase());
                });
                //Handle Video Navigation on XS Devices
                //Open & Close
                $("#btnShowVideoNavigation, #video-navigation .close").on("click", function() {
                    $("body").toggleClass("scrollbar hidden");
                    $("#video-navigation").transition("drop");
                });
            });
            
            function search(query) {
                var items = $("#video-navigation").find(".item:not(.item:first)");
                var showNoFound = true;
                $(items).each(function(index, item) {
                    var iVal = $(item).text().toUpperCase();
                    if (!$(this).is("#msgNoFound")) {
                        if(iVal.indexOf(query) > -1) {
                            showNoFound = false;
                            $(item).fadeIn("fast");
                        } else
                            $(item).fadeOut("fast");
                    }
                });
                if (showNoFound)
                    $("#msgNoFound").delay(100).fadeIn("fast");
                else
                    $("#msgNoFound").hide();
            }
        </script>
        
        <div class="wrapper">
            <!--#include virtual="/common/component/header.html" -->
            
            <button class="ui blue labeled icon button" id="btnShowVideoNavigation">
                <i class="video icon"></i>
                Visualizza elenco video
            </button>
            
            <div class="video-content">
                <?php
                    //Require engine PHP page
                    require '../common/php/engine.php';
                    //Vide ID
                    $vID = filter_input(INPUT_GET, "v");
                    
                    //Query
                    $videoInfo = query("SELECT Titolo,Descrizione,DataPub FROM video WHERE VideoID='$vID' LIMIT 1;");
                    
                    if(!isset($vID) || $vID === "" || mysqli_num_rows($videoInfo) == 0) {?>
                        <div id="noVideo"><img src="http://www.progettotorino.it/wp-content/uploads/2016/05/ICT-graphic.jpg" alt="informatica" style="width: 100%; height: 100%;"/></div>
                    <?php } else {
                        //Execute queries
                        $creatorInfo = query("SELECT A.* FROM video V,realizza R,autore A WHERE V.Cod=R.CodVideo AND R.IDAutore=A.ID AND V.VideoID='$vID';");?>
                        
                        <div id="video">
                            <div data-type="youtube" data-video-id="<?php echo $vID;?>"></div>
                        </div>
                        <div id="video-descrition">
                            <div class="card">
                                <!--Video Info-->
                                <?php $vInfo = mysqli_fetch_array($videoInfo)?>
                                <div class="ui label" style="float: right;">
                                    <i class="calendar icon"></i>
                                    <?php echo $vInfo["DataPub"]?>
                                </div>
                                <h1 style="margin: 0;"><?php echo $vInfo["Titolo"];?></h1>
                                <p><?php echo $vInfo["Descrizione"];?></p>

                                <!--Creator Info-->
                                <?php if (mysqli_num_rows($creatorInfo) > 0) {
                                    while ($row = mysqli_fetch_array($creatorInfo)) {?>
                                        <a href="/author/index.php?aID=<?php echo $row["ID"];?>" class="ui image label <?php echo $row["Color"];?>">
                                            <img src="<?php echo $row["PathMiniatura"];?>" alt="autore"/>
                                            <?php echo $row["Nome"]."&nbsp;".$row["Cognome"];?>
                                            <div class="detail"><?php echo $row["Classe"];?></div>
                                        </a>
                                <?php }} else {?>
                                    <div class="ui label red"><i class="warning sign icon"></i>Autore sconosciuto</div>
                                <?php }?>
                            </div>
                            <div class="card">
                                <h1>Materiale</h1>
                                <?php $attachment = query("SELECT M.PathMateriale,M.Tipo FROM video V,materiale M WHERE V.Cod=M.Fk_Video AND V.VideoID='$vID';");
                                    if (mysqli_num_rows($attachment) > 0) {?>
                                        <!--Inserire HTML quando è presente del materiale da scaricare-->
                                    <?php } else {?>
                                        <div class="ui icon message">
                                            <i class="info icon"></i>
                                            <div class="content">
                                                <p>Nessun materiale disponibile</p>
                                            </div>
                                        </div>
                                <?php } ?>
                            </div>
                        </div>
                    <?php }?>
            </div>
            <div id="video-navigation">
                <div class="scrollbar informatica ui vertical menu">
                    <div class="item">
                        <div class="ui transparent icon input">
                            <input type="text" placeholder="Cerca...">
                            <i class="search icon"></i>
                        </div>
                    </div>
                    <div class="item" id="msgNoFound">
                        <i class="rocket icon"></i>Nessun video trovato
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
                <button class="close">
                    <span></span>
                </button>
            </div>
        </div>
        <script>plyr.setup();</script>
    </body>
</html>
