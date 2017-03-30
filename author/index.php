<!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Informazioni autore</title>
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
            .ui.raised.card .header {
                font-family: Lato,'Helvetica Neue',Arial,Helvetica,sans-serif;
                border: none;
                box-shadow: none;
                -webkit-box-shadow: none;
                -moz-box-shadow: none;
                border-radius: 0;
                -webkit-border-radius: 0;
                -moz-border-radius: 0;
                background-color: transparent;
                height: auto;
            }
            .ui.raised.card {
                display: block;
                margin: 3% auto;
            }
            #card {
                width: 225px;
                display: inline-block;
            }
            #contenitore-4 {
                margin-top: 100px;
                width: 1000px;
                vertical-align: middle;
                max-width: 100%;
                margin:auto;
            }
        </style>
    </head>
    <body>
        <div class="contenuto">
            <!--#include virtual="/common/component/header.html" -->
            <?php
            require '../common/php/engine.php';
            $connection = null;
            connect($connection);
            $authorID = filter_input(INPUT_GET, "aID");
            $txtQuery = "SELECT A.Nome, A.Cognome, A.Classe, A.AnnoS, A.Sesso, V.Titolo, V.PathMiniatura, M.NomeIndirizzo AS 'Materia', (SELECT COUNT(*) FROM realizza WHERE IDAutore = A.ID) AS 'NumVideo' FROM autore A, realizza R, video V, materia M WHERE ID = '$authorID' AND A.ID = R.IDAutore AND V.Cod = R.CodVideo AND V.CodMateria = M.Cod";
            $query = mysqli_query($connection, $txtQuery);
            $row = mysqli_fetch_array($query);
            if ($row > 0) {
                ?>
                <div class="ui raised card">
                    <div class="content">
                        <div class="header"><?php echo $row['Nome'] . " " . $row['Cognome'] ?></div>
                        <div class="description"><?php echo $row['Classe'] ?></div>
                        <div class="meta">
                            <span class="category">Classe</span>
                        </div>
                        <div class="description"><?php echo $row['AnnoS'] ?></div>
                        <div class="meta">
                            <span class="category">Anno Scolastico</span>
                        </div>
                    </div>
                    <div class="extra content">
                        <div class="left floated author">
                            <i class="film icon"></i>
                            <?php echo $row['NumVideo'] ?>
                        </div>
                        <div class="right floated author">
                            <?php
                            switch ($row['Sesso']) {
                                case "M":
                                    ?> <img class="ui avatar image" src="https://semantic-ui.com/images/avatar2/large/matthew.png"> <?php
                                    break;
                                case "F":
                                    ?> <img class="ui avatar image" src="https://semantic-ui.com/images/avatar2/large/molly.png"> <?php
                                    break;
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="ui stackable four column grid" id="contenitore-4">
                    <?php
                    while ($row) {
                        switch ($row['Materia']) {
                            case 'Informatica':
                                $color = 'blue';
                                break;
                            case 'Meccanica':
                                $color = 'green';
                                break;
                            case 'Elettrotecnica':
                                $color = 'orange';
                                break;
                            case 'Costruzioni':
                                $color = 'brown';
                                break;
                            case 'Chimica':
                                $color = 'red';
                                break;
                        }
                        ?>
                        <div class="column">
                            <div class="ui card <?php echo $color ?>"  id="card">
                                <a class="image">
                                    <div class="ui <?php echo $color ?> ribbon label"><?php echo $row['Materia'] ?></div>
                                    <img src="<?php echo $row['PathMiniatura'] ?>">
                                </a>
                                <div class="content">
                                    <div><h2><a href="#"><?php echo $row['Titolo'] ?></a></h2></div>
                                </div>
                            </div>
                        </div>
                        <?php
                        $row = mysqli_fetch_array($query);
                    }
                    ?>
                </div>
            <?php } ?>
        </div>
    </body>
</html>