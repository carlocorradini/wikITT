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
            .ui.card .header {
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
            .ui.card {
                display: block;
                margin: 2vh auto;
            }
            .ui.link.fluid.card {
                max-width: 35vh;
            }
            .ui.link.stackable.fluid.card {
                max-width: 30vh;
            }
            #tab {
                margin-top: 45px;
            }
            #contenitore-4 {
                margin-top: 100px;
                width: 150vh;
                vertical-align: middle;
                max-width: 100%;
                margin: auto;
                display: none;
            }
            #show-hide {
                background-color: #21BA45;
                color: #FFF;
                -webkit-transition-duration: 0.5s;
                transition-duration: 0.5s;
            }
            .link {
                text-decoration: none !important;
            }
            .center {
                display: block;
                margin: 0 2vh 0 2vh;
            }
            #back {
                -webkit-transition-duration: 0.5s;
                transition-duration: 0.5s;
            }
            .ui.center.aligned.grid {
                margin-top: 5vh;
                margin-bottom: 1vh;
            }
            .ui.buttons .ui.button {
                min-width: 12vh;
            }
        </style>
    </head>
    <body>
        <script>
            $(document).ready(function () {
                $("#show-hide").one("click", show);
                $("#show-hide").hover(function () {
                    $("#show-hide").css("background-color", "#009924");
                }, function () {
                    $("#show-hide").css("background-color", "#21BA45");
                });
                $("#sortNome").one("click", alphaSort);
                $("#sortData").one("click", dateSort);
            });

            function show() {
                change($(this), "Nascondi video", "#E0E1E2", "#000", "#C7C8C9");
                $(this).one("click", hide);
            }

            function hide() {
                change($(this), "Mostra video", "#21BA45", "#FFF", "#009924");
                $(this).one("click", show);
            }

            function change(btn, btnTxt, btnColor, btnTxtColor, btnHoverIn) {
                var container = $("#contenitore-4");
                btn.text(btnTxt);
                btn.css("color", btnTxtColor);
                btn.css("background-color", btnColor);
                container.transition("drop");
                btn.hover(function () {
                    btn.css("background-color", btnHoverIn);
                }, function () {
                    btn.css("background-color", btnColor);
                });
            }

            function createView($cards) {
                $("#contenitore-4 .ui.stackable.four.column.grid .column").remove();
                for (i = 0; i < $cards.length; i++) {
                    console.log("createView " + $cards.length);
                    $("#contenitore-4 .ui.stackable.four.column.grid").append("<div class='column' id='" + i + "'></div>");
                    $("#contenitore-4 .ui.stackable.four.column.grid #" + i).html($cards[i]);
                }
            }

            function dateSort() {
                $("#sortNome i").removeClass("ascending").removeClass("descending");
                if ($("#sortData i").hasClass("ascending")) {
                    $("#sortData i").removeClass("ascending").addClass("descending");
                } else {
                    $("#sortData i").addClass("descending");
                }
                var $cards = $("a.ui.link.stackable.fluid.card");
                var alphabeticallyOrderedDivs = $cards.sort(function (a, b) {
                    return $(a).find("#dataPub").text() < $(b).find("#dataPub").text();
                });
                $cards = alphabeticallyOrderedDivs;
                createView($cards);
                $("#sortData").one("click", dateSortReverse);
            }

            function dateSortReverse() {
                $("#sortNome i").removeClass("ascending").removeClass("descending");
                if ($("#sortData i").hasClass("descending")) {
                    $("#sortData i").removeClass("descending").addClass("ascending");
                }
                var $cards = $("a.ui.link.stackable.fluid.card");
                var alphabeticallyOrderedDivs = $cards.sort(function (a, b) {
                    return $(a).find("#dataPub").text() > $(b).find("#dataPub").text();
                });
                $cards = alphabeticallyOrderedDivs;
                createView($cards);
                $("#sortData").one("click", dateSort);
            }

            function alphaSort() {
                $("#sortData i").removeClass("ascending").removeClass("descending");
                if ($("#sortNome i").hasClass("ascending")) {
                    $("#sortNome i").removeClass("ascending").addClass("descending");
                } else {
                    $("#sortNome i").addClass("descending");
                }
                var $cards = $("a.ui.link.stackable.fluid.card");
                var alphabeticallyOrderedDivs = $cards.sort(function (a, b) {
                    return $(a).find("div.header").text() > $(b).find("div.header").text();
                });
                $cards = alphabeticallyOrderedDivs;
                createView($cards);
                $("#sortNome").one("click", alphaSortReverse);
            }

            function alphaSortReverse() {
                $("#sortData i").removeClass("ascending").removeClass("descending");
                if ($("#sortNome i").hasClass("descending")) {
                    $("#sortNome i").removeClass("descending").addClass("ascending");
                }
                var $cards = $("a.ui.link.stackable.fluid.card");
                var alphabeticallyOrderedDivs = $cards.sort(function (a, b) {
                    return $(a).find("div.header").text() < $(b).find("div.header").text();
                });
                $cards = alphabeticallyOrderedDivs;
                createView($cards);
                $("#sortNome").one("click", alphaSort);
            }
        </script>
        <div class="contenuto">
            <!--#include virtual="/common/component/header.html" -->
            <div class="center" id="tab">
                <div class="ui stackable four column grid">
                    <?php
                    require '../common/php/engine.php';
                    $connection = null;
                    connect($connection);
                    $authorID = filter_input(INPUT_GET, "a");
                    if (!isset($authorID) || $authorID === "") {
                        $txtQuery = "SELECT A.ID, A.Nome, A.Cognome, A.Classe, A.Colore FROM autore A ORDER BY A.Nome, A.Cognome, A.ID";
                        $query = mysqli_query($connection, $txtQuery);
                        while ($row = mysqli_fetch_array($query)) {
                            ?>
                            <div class="column">
                                <a class="ui link fluid <?php echo $row['Colore'] ?> card" href="/author/index.php?a=<?php echo $row['ID'] ?>">
                                    <div class="content">
                                        <div class="header"><?php echo $row['Nome'] . " " . $row['Cognome'] ?></div>
                                        <div class="description"><?php echo $row['Classe'] ?></div>
                                        <div class="meta">
                                            <span class="category">Classe</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <?php
                        }
                    } else {
                        ?>
                    </div>
                </div>
                <div class="center">
                    <a id="back" class="ui labeled icon button inverted blue" href="index.php">
                        <i class="left arrow icon"></i>
                        Torna alla lista
                    </a>
                    <?php
                    $txtQuery = "SELECT A.ID, A.Nome, A.Cognome, A.Classe, A.AnnoS, A.Sesso, A.Colore, V.Titolo, M.NomeIndirizzo AS 'Materia', (SELECT COUNT(*) FROM realizza WHERE IDAutore = A.ID) AS 'NumVideo' FROM autore A, realizza R, video V, materia M WHERE ID = '$authorID' AND A.ID = R.IDAutore AND V.Cod = R.CodVideo AND V.CodMateria = M.Cod ORDER BY V.Titolo, V.Cod";
                    $query = mysqli_query($connection, $txtQuery);
                    $row = mysqli_fetch_array($query);
                    if ($row > 0) {
                        ?>
                        <div class="ui <?php echo $row['Colore'] ?> card">
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
                                <div class="description"><?php echo $row['ID'] ?></div>
                                <div class="meta">
                                    <span class="category">ID Autore</span>
                                </div>
                            </div>
                            <div class="extra content">
                                <div class="left floated author">
                                    <i class="film icon"></i><?php echo $row['NumVideo'] . " video" ?>
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
                            <div class="extra content">
                                <button class="ui fluid toggle button" id="show-hide">Mostra video</button>
                            </div>
                        </div>
                        <div id="contenitore-4">
                            <div class="ui center aligned grid">
                                <div class="ui buttons">
                                    <button class="ui teal button" id="sortNome"><i class="icon sort"> </i> Nome</button>
                                    <div class="or"></div>
                                    <button class="ui teal button" id="sortData"><i class="icon sort"> </i> Data</button>
                                </div>

                            </div>
                            <div class="ui stackable four column grid">
                                <?php
                                $authorID = filter_input(INPUT_GET, "a");
                                $txtQuery = "SELECT A.ID, A.Nome, A.Cognome, A.Classe, A.AnnoS, A.Sesso, A.Colore, V.Titolo, V.Descrizione, V.VideoID, V.DataPub, M.NomeIndirizzo AS 'Materia', (SELECT COUNT(*) FROM realizza WHERE IDAutore = A.ID) AS 'NumVideo' FROM autore A, realizza R, video V, materia M WHERE ID = '$authorID' AND A.ID = R.IDAutore AND V.Cod = R.CodVideo AND V.CodMateria = M.Cod";
                                $query = mysqli_query($connection, $txtQuery);
                                while ($row = mysqli_fetch_array($query)) {
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
                                        <a class="ui link stackable fluid card <?php echo $color ?>" href="/<?php echo strtolower($row['Materia']) ?>/index.php?v=<?php echo $row['VideoID'] ?>">
                                            <div class="image">
                                                <div class="ui <?php echo $color ?> ribbon label"><?php echo $row['Materia'] ?></div>
                                                <img src="https://img.youtube.com/vi/<?php echo $row['VideoID'] ?>/sddefault.jpg">
                                            </div>
                                            <div class="content">
                                                <div class="header"><?php echo $row['Titolo'] ?></div>
                                                <div class="description" id="dataPub"><?php echo $row['DataPub'] ?></div>
                                                <div class="meta">
                                                    <span class="category">Data</span>
                                                </div>
                                                <div class="description"><?php echo $row['Descrizione'] ?></div>
                                            </div>
                                        </a>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </body>
</html>
