<?php
//Require engine PHP page
require '../../common/php/engine.php';
//Start Session
session_start();
if (!authentication_session()) {
    header("Location: /admin/index.php");
    die();
}
?>

<!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Admin | Aggiungi Video</title>
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
    </head>
    <body>
        <script>
            $(document).ready(function() {
                $('.ui.dropdown').dropdown(
                    {allowAdditions: true
                });
                $('.ui.dropdown').dropdown();
                $('#select').dropdown();
                  
                $("#uploadVideo").submit(function() {
                    $(this).addClass("loading");
                        var url = "/common/php/uploadVid.php";
                        $.ajax({
                            type: 'POST',
                            data: $("#uploadVideo").serialize(),
                            url: url,
                            success: function (data) {
                                //If all is correct show success message else prompt error
                                if (data.status) {
                                    //alert("Inserimento riuscito");
                                    $("#uploadVideo").removeClass("loading");
                                }
                                else
                                    alert("Inserimento fallito");
                                console.info("[UPLOAD_VIDEO]: " + data.message);
                            }, error: function (jqXHR, status, error) {
                                console.error("[UPLOAD_VIDEO]: " + error);
                            }
                        });
                    return false;
                });
            });
        </script>
        <style>
            #upload-video-panel {
                width: 1000px;
                max-width: 100%;
                margin: 0 auto;
                padding: 0 10px;
            }
        </style>
        <div class="wrapper">
            <?php include $_SERVER["DOCUMENT_ROOT"]."/common/component/header.html";
            if(authentication_session()){
                require '../admin_navigator.php';
            ?>
                <div id="upload-video-panel">
                    <!--
                    Campi FORM Video:
                        VideoID
                        Materia
                        Autori
                    Dati impliciti o ricavati:
                        COD
                        Titolo
                        Descrizione
                    -->
                    <form class="ui form  attached segment" id="uploadVideo1" method="post" action="/common/php/uploadVid.php">
                        <h1 class="ui horizontal divider header">
                            <i class="icons">
                                <i class="video icon"></i>
                                <i class="corner add icon"></i>
                            </i>
                            Nuovo Video
                        </h1>
                        <div class="field">
                            <label>YouTube VideoID</label>
                            <div class="ui left icon input">
                                <i class="video play icon"></i>
                                <input type="text"  id="user" name="videoID" placeholder="VideoID">
                            </div>
                        </div>

                        <div class="ui fluid search selection dropdown field ">
                            <input name="materia" type="hidden">
                            <i class="dropdown icon"></i>
                            <div class="default text">Materia</div>
                            <div class="menu">
                                <?php
                                    $ris = query("SELECT DISTINCT m.Cod, m.Nome FROM materia m, indirizzo i ORDER BY i.Nome;");
                                    while ($row= mysqli_fetch_array($ris)){
                                        echo "<div class='item' data-value=$row[Cod]>$row[Nome] ($row[Cod])</div>";
                                    }
                                ?>
                            </div>
                        </div>

                        <div class="ui fluid multiple search selection dropdown field">
                            <input name="autori" type="hidden">
                            <i class="dropdown icon"></i>
                            <div class="default text">Autori</div>
                            <div class="menu">
                                <?php
                                    $ris = query("SELECT a.ID, a.Nome, a.Cognome, a.Classe FROM autore a ORDER BY a.Classe, a.Cognome, a.Nome;");
                                    while ($row= mysqli_fetch_array($ris)){
                                        echo "<div class='item' data-value=$row[ID]>$row[Cognome] $row[Nome] ($row[Classe])</div>";
                                    }
                                ?>
                            </div>
                        </div>
                        <button type="submit" class="ui button blue">Aggiungi</button>  
                    </form>
                    <div id="form-video-msg" class="ui bottom attached message">
                        <i class="send icon"></i>
                        <span>Inserire dati video</span>
                    </div>
                </div>
            <?php }?>
        </div>
    </body>
</html>
