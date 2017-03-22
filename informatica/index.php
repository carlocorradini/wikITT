
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
        
        
        <!--Ply-->
        <link rel="stylesheet" type="text/css" href="https://cdn.plyr.io/2.0.7/plyr.css"/>
        <script src="https://cdn.plyr.io/2.0.7/plyr.js" type="text/javascript"></script>
        
        
        <!--END Framweworks-->
        
        <!--Custom-->
        <link rel="stylesheet" type="text/css" href="/common/style/style.css"/>
        <script src="/common/script/script.js" type="text/javascript"></script>
        <style>
            .video-nav {
                position: absolute;
                width: 20%;
            }
            .video-content {
                position: absolute;
                width: 80%;
                right: 0;
            }
            @media screen and (max-width: 600px) {
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
        <div class="contenuto">
            <!--#include virtual="/common/component/header.html" -->
            <div class="video-nav">
                <div class="ui secondary vertical pointing menu">
                    <?php
                        //Require engine PHP page
                        require '../common/php/engine.php';
                        //DB usage
                        $connection = null;
                        
                        connect($connection);
                        
                        $result = mysqli_query($connection, "SELECT Titolo,VideoID FROM video;");
                        if ($result == FALSE) { die(mysqli_error($connection));}
                        
                        if (mysqli_num_rows($result)) {
                            while ($row = mysqli_fetch_array($result)) {
                                ?>
                                <a class="item" href="index.php?v=<?php echo $row["VideoID"];?>">
                                    <?php echo $row["Titolo"];?>
                                </a>
                                <?php
                            }
                        }
                    ?>
                </div>
            </div>
            <div class="video-content">
                <div data-type="youtube" data-video-id="<?php echo filter_input(INPUT_GET, "v")?>"></div>
            </div>
        </div>
        <script>plyr.setup();</script>
    </body>
</html>
