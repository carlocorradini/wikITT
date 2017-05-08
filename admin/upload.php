<!DOCTYPE html>
<?php
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Video Upload</title>
        <link rel="icon" href="/common/image/icon.ico" type="image/x-icon">
        
        <!--Frameworks-->
        <!--Pace-->
        <link rel="stylesheet" type="text/css" href="/common/framework/pace/pace.min.css"/>
        <script src="/common/framework/pace/pace.min.js" type="text/javascript"></script>
        <!--Jquery-->
        <script src="/common/framework/jquery.min.js" type="text/javascript"></script>
        <!--Semantic-UI-->
        <link rel="stylesheet" type="text/css" href="/common/framework/semantic-UI/semantic.min.css"/>
        <link rel="stylesheet" type="text/css" href="/common/framework/bootstrap.min.css"/>
        <script src="/common/framework/semantic-UI/semantic.min.js" type="text/javascript"></script>
        
        <!--Plyr-->
        <link rel="stylesheet" type="text/css" href="https://cdn.plyr.io/2.0.7/plyr.css"/>
        <script src="https://cdn.plyr.io/2.0.7/plyr.js" type="text/javascript"></script>
        <!--END Framweworks-->
    </head>
    <body>
        <div class="contenuto">
        <!--#include virtual="/common/component/header.html" -->
        <?php
        // put your code here
        ?>
        <div class="main">
                <div class="wrapper">

                    <div class="row">
                        <div class="col-sm-4"></div>
                        <div class="col-sm-4">

                            <h1 class="center_aligned">Aggiunta nuovo autore</h1>

                            <form class="ui form" id="form_input" action="login.php" method="get" onsubmit="load()">
                                <div class="field">
                                    <label>Nome Autore</label>
                                    <div class="ui right icon input">
                                         <i class="user icon"></i>
                                         <input type="text"  id="user" name="Nome" placeholder="Nome">
                                    </div>
                                </div>


                                <div class="field">
                                    <label>Cognome Autore</label>
                                    <div class="ui right icon input">
                                        <i class="lock icon"></i>
                                        <input type="text" id="psw" name="Cognome" placeholder="Cognome">
                                    </div>
                                </div>
                                
                                <div class="field">
                                    <label>Classe Autore</label>
                                    <div class="ui right icon input">
                                        <i class="lock icon"></i>
                                        <input type="text" id="psw" name="Classe" placeholder="Classe">
                                    </div>
                                </div>
                                
                                <div class="field">
                                    <label>Anno Scolastico</label>
                                    <div class="ui right icon input">
                                        <i class="calendar icon"></i>
                                        <input type="text" id="psw" name="AnnoS" placeholder="Anno scolastico">
                                    </div>
                                </div>
                                
                                <div class="field">
                                    <label>Sesso</label>
                                    <select class="ui dropdown">
                                        <option value="M" >Maschio</option>
                                        <option value="F">Femmina</option>
                                  </select>
                                </div> 
                  
                                <!-- Immagine -->
                                <div class="field">
                                    <label>Miniatura autore</label>
                                        <select>
                                            <option value="volvo" style="background-image:url(images/volvo.png);">Volvo</option>
                                            <option value="saab"  style="background-image:url(images/saab.png);">Saab</option>
                                            <option value="honda" style="background-image:url(images/honda.png);">Honda</option>
                                            <option value="audi"  style="background-image:url(images/audi.png);">Audi</option>
                                        </select>
                                </div>
                                
                                <!-- Colore -->
                                <div class="field">
                                    <label>Colore</label>
                                    <select class="ui dropdown">
                                        <option value="M" style="background-color: red">Rosso</option>
                                        <option value="F" style="background-color: orange">Arancio</option>
                                        <option value="F" style="background-color: yellow">Giallo</option>
                                        <option value="F" style="background-color: olive">Oliva</option>
                                        <option value="F" style="background-color: green">Verde</option>
                                        <option value="F" style="background-color: teal">Azzurro</option>
                                        <option value="F" style="background-color: blue">Blu</option>
                                        <option value="F" style="background-color: violet">Viola</option>
                                        <option value="F" style="background-color: purple">Fucsia</option>
                                        <option value="F" style="background-color: pink">Rosa</option>
                                        <option value="F" style="background-color: brown">Marrone</option>
                                        <option value="F" style="background-color: gray">Grigio</option>
                                        <option value="F" style="background-color: black">Nero</option>
                                        
                                  </select>
                                </div>
                                

                                <button type="submit" class="ui button">LOGIN</button>  
                            </form>
                        </div>
                        <div class="col-sm-4"></div>
                    </div>
                </div>
        </div></div>
        <!--#include virtual="/common/component/footer.html" -->
    </body>
</html>
