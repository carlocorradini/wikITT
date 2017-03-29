
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
                    if(!isset($vID) || $vID === "") {?>
                
                
                
                <div class="ui small breadcrumb">
                    <a class="section" href="../index.html">Home</a>
                    <div class="divider"> / </div>
                    <div class="active section">Informatica</div>
                </div>

                <div class="ui horizontal divider">
                    Informatica
                </div>
                <div class="ui centered">
                    Benvenuto alla pagina di presentazione di informatica!
                </div>
                <div class="ui horizontal divider">
                    <i class="code icon"></i>
                </div>
                
                
                
                
                
                    <?php } else {?>
                        <div data-type="youtube" data-video-id="<?php echo $vID;?>"></div>
                    <?php }
                    $videoTitle = query("SELECT Titolo FROM video WHERE VideoID='$vID' LIMIT 1");
                    echo "<h1>".mysqli_fetch_array($videoTitle)["Titolo"]."</h1>";
                    ?>
            </div>
            <div class="video-nav">
                <div class="ui vertical pointing menu">
                    <div class="item">
                        <div class="ui input">
                            <input type="text" placeholder="Cerca...">
                        </div>
                    </div>
                    <?php
                        $result = query("SELECT Titolo,VideoID FROM video ORDER BY Titolo;");
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_array($result)) {?>
                                <a class="item <?php if($row["VideoID"] === $vID) { echo "active";}?>"
                                   href="index.php?v=<?php echo $row["VideoID"];?>">
                                    <?php echo $row["Titolo"];?>
                                </a>
                            <?php }
                        }
                    ?>
                </div>
            </div>
        </div>
        <script>plyr.setup();</script>
    </body>
</html>
