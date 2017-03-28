
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
            .video-nav,
            .video-content {
                padding: 1em;
                transition: padding 0.5s;
                -webkit-transition: padding 0.5s;
                -moz-transition: padding 0.5s;
            }
            
            .video-nav {
                position: absolute;
                width: 20%;
                padding-right: 0.5em;
            }
            .video-nav .ui.vertical.menu {
                width: 100%;
            }
            .video-content {
                position: absolute;
                width: 80%;
                right: 0;
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
                .video-nav {
                    display: none;
                }
                .video-content {
                    width: 100%;
                }
            }
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
                var showNoFound = false;
                
                $(items).each(function(index, item) {
                    var iVal = $(item).text().toUpperCase();
                    if(iVal.indexOf(query) > -1)
                        $(item).fadeIn("fast");
                    else
                        $(item).fadeOut("fast");
                });
            }
        </script>
        <div class="contenuto">
            <!--#include virtual="/common/component/header.html" -->
            <div class="video-nav">
                <div class="ui vertical pointing menu">
                    <div class="item">
                        <div class="ui input">
                            <input type="text" placeholder="Cerca...">
                        </div>
                    </div>
                    <?php
                        //Require engine PHP page
                        require '../common/php/engine.php';
                        //Vide ID
                        $vID = filter_input(INPUT_GET, "v");
                        
                        $result = query("SELECT Titolo,VideoID FROM video ORDER BY Titolo;");
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_array($result)) {?>
                                <a class="item <?php if($row["VideoID"] === $vID) { echo "active";}?>"
                                   href="index.php?v=<?php echo $row["VideoID"];?>">
                                    <?php echo $row["Titolo"];?>
                                </a>
                            <?php }
                        }?>
                </div>
            </div>
            <div class="video-content">
                <?php if(!isset($vID) || $vID === "") {?>
                <img src="http://www.progettotorino.it/wp-content/uploads/2016/05/ICT-graphic.jpg" alt="informatica" style="width: 100%; height: 100%;"/>
                <?php } else {?>
                <div data-type="youtube" data-video-id="<?php echo $vID;?>"></div>
                <?php }?>
            </div>
        </div>
        <script>plyr.setup();</script>
    </body>
</html>
