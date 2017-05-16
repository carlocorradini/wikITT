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
        
        <!--Custom-->
        <link rel="stylesheet" type="text/css" href="/common/style/style.css"/>
        <script src="/common/script/script.js" type="text/javascript"></script>
    </head>
    <body>
        <script>
            $(document).ready(function() {
                $('.ui.dropdown')
                    .dropdown({
                      allowAdditions: true
                    })
                  ;

                  $('.ui.dropdown')
                    .dropdown()
                  ;

                  $('#select')
                    .dropdown()
                  ;
                  
                  $("#uploadAuth").submit(function() {    
                       $(this).addClass("loading");
                        var url = "/common/php/uploadAuth.php";
                        $.ajax({
                            type: 'POST',
                            data: $("#uploadAuth").serialize(),
                            url: url,
                            success: function (data) {
                                //If all is correct show success message else prompt error
                                if (data.status) {
                                    //alert("Inserimento riuscito");
                                    $("#uploadAuth").removeClass("loading");
                                }
                                else
                                    alert("Inserimento fallito");
                            }, error: function (jqXHR, status, error) {
                                console.error("[UPLOADAUUTHOR]: "+error);
                            }
                        });
                    return false;
                    });
            });
        </script>
        <div class="wrapper">
        <!--#include virtual="/common/component/header.html" -->
        <?php
        // put your code here
        ?>
        <div class="main"> 
            <div class="ui container">
                <h1 class="center_aligned">Aggiunta nuovo autore</h1>

                            <form class="ui form" id="uploadAuth">
                                <div class="field">
                                    <label>Nome Autore</label>
                                    <div class="ui right icon input">
                                         <i class="student icon"></i>
                                         <input type="text"  id="user" name="Nome" placeholder="Nome">
                                    </div>
                                </div>
                                
                                <!--
                                <div class="ui fluid multiple search selection dropdown">
                                    <input name="tags" type="hidden">
                                    <i class="dropdown icon"></i>
                                    <div class="default text">Skills</div>
                                    <div class="menu">
                                      <div class="item" data-value="angular">Angular</div>
                                  <div class="item" data-value="css">CSS</div>
                                  <div class="item" data-value="design">Graphic Design</div>
                                  <div class="item" data-value="ember">Ember</div>
                                  <div class="item" data-value="html">HTML</div>
                                  <div class="item" data-value="ia">Information Architecture</div>
                                  <div class="item" data-value="javascript">Javascript</div>
                                  <div class="item" data-value="mech">Mechanical Engineering</div>
                                  <div class="item" data-value="meteor">Meteor</div>
                                  <div class="item" data-value="node">NodeJS</div>
                                  <div class="item" data-value="plumbing">Plumbing</div>
                                  <div class="item" data-value="python">Python</div>
                                  <div class="item" data-value="rails">Rails</div>
                                  <div class="item" data-value="react">React</div>
                                  <div class="item" data-value="repair">Kitchen Repair</div>
                                  <div class="item" data-value="ruby">Ruby</div>
                                  <div class="item" data-value="ui">UI Design</div>
                                  <div class="item" data-value="ux">User Experience</div>
                                </div>
                                </div>
                                -->


                                <div class="field">
                                    <label>Cognome Autore</label>
                                    <div class="ui right icon input">
                                        <i class="user icon"></i>
                                        <input type="text" id="psw" name="Cognome" placeholder="Cognome">
                                    </div>
                                </div>
                                
                                <div class="field">
                                    <label>Classe Autore</label>
                                    <div class="ui right icon input">
                                        <i class="users icon"></i>
                                        <input type="text" id="psw" name="Classe" placeholder="Classe">
                                    </div>
                                    <div class="hidden ui pointing label">
                                        Esempio formato: 5 INA
                                    </div>
                                </div>
                                
                                <div class="field">
                                    <label>Anno Scolastico</label>
                                    <div class="ui right icon input">
                                        <i class="calendar icon"></i>
                                        <input type="text" id="psw" name="AnnoS" placeholder="Anno scolastico">
                                    </div>
                                    <div class="hidden ui pointing label">
                                        Esempio formato: 16/17
                                    </div>
                                </div>
                                
                                <div class="field">
                                    <label>Sesso</label>
                                    <div class="ui selection dropdown">
                                    <input type="hidden" name="gender">
                                    <i class="dropdown icon"></i>
                                    <div class="default text">Sesso</div>
                                    <div class="menu">
                                      <div class="item" data-value="M" data-text="Maschio">
                                        <i class="male icon"></i>
                                        Maschio
                                      </div>
                                      <div class="item" data-value="F" data-text="Femmina">
                                        <i class="female icon"></i>
                                        Femmina
                                      </div>
                                    </div>
                                  </div>
                                </div>
                  
                                <!-- Immagine 
                                <div class="field">
                                    <label>Miniatura autore</label>
                                        <select>
                                            <div style="background-image:url(/common/image/profile/1f.png);"><option value="volvo">Volvo</option></div>
                                            <option value="saab"  style="background-image:url(/common/image/profile/1m.png);">Saab</option>
                                            <option value="honda" style="background-image:url(/common/image/profile/2f.png);">Honda</option>
                                            <option value="audi"  style="background-image:url(/common/image/profile/2m.png);">Audi</option>
                                        </select>
                                </div> -->
                                <!-- Colore --> 

                                <div class="ui floating dropdown labeled icon button">
                                    <input type="hidden" name="colore">
                                    <i class="paint brush icon"></i>
                                    <span class="text">Colore utente</span>
                                    <div class="menu">
                                      <div class="ui icon search input">
                                        <i class="search icon"></i>
                                        <input type="text" placeholder="Cerca colore...">
                                      </div>
                                      <div class="divider"></div>
                                      <div class="scrolling menu">
                                        <div class="item" data-value="red">
                                          <div class="ui red empty circular label"></div>
                                          Rosso
                                        </div>
                                        <div class="item" data-value="orange">
                                          <div class="ui orange empty circular label"></div>
                                          Arancione
                                        </div>
                                        <div class="item" data-value="yellow">
                                          <div class="ui yellow empty circular label"></div>
                                          Giallo
                                        </div>
                                        <div class="item" data-value="olive">
                                          <div class="ui olive empty circular label"></div>
                                          Verde oliva
                                        </div>
                                        <div class="item" data-value="green">
                                          <div class="ui green empty circular label"></div>
                                          Verde
                                        </div>
                                        <div class="item" data-value="teal">
                                          <div class="ui teal empty circular label"></div>
                                          Verde acqua
                                        </div>
                                        <div class="item" data-value="blue">
                                          <div class="ui blue empty circular label"></div>
                                          Blu
                                        </div>
                                        <div class="item" data-value="violet">
                                          <div class="ui violet empty circular label"></div>
                                          Viola scuro
                                        </div>
                                        <div class="item" data-value="purple">
                                          <div class="ui purple empty circular label"></div>
                                          Viola chiaro
                                        </div>
                                        <div class="item" data-value="pink">
                                          <div class="ui pink empty circular label"></div>
                                          Rosa
                                        </div>
                                        <div class="item" data-value="brown">
                                          <div class="ui brown empty circular label"></div>
                                          Marrone
                                        </div>
                                        <div class="item" data-value="grey">
                                          <div class="ui grey empty circular label"></div>
                                          Grigio
                                        </div>
                                        <div class="item" data-value="black">
                                          <div class="ui black empty circular label"></div>
                                          Nero
                                        </div>
                                      </div>
                                    </div>
                                </div>
                                        
                                <br><br>
                                <div class="field">
                                <div class="ui floating dropdown labeled icon button">
                                    <input type="hidden" name="icona">
                                    <i class="image icon"></i>
                                    <span class="text">Icona utente</span>
                                    <div class="menu">
                                      <div class="scrolling menu">
                                        <div class="item" data-value="1f">
                                            <img class="ui avatar image" src="/common/image/profile/1f.png">                  
                                        </div>
                                        <div class="item" data-value="1m">
                                            <img class="ui avatar image" src="/common/image/profile/1m.png"> 
                                        </div>
                                        <div class="item" data-value="2f">
                                            <img class="ui avatar image" src="/common/image/profile/2f.png"> 
                                        </div>
                                        <div class="item" data-value="2m">
                                            <img class="ui avatar image" src="/common/image/profile/2m.png"> 
                                        </div>
                                        <div class="item" data-value="3f">
                                            <img class="ui avatar image" src="/common/image/profile/3f.png"> 
                                        </div>
                                        <div class="item" data-value="3m">
                                            <img class="ui avatar image" src="/common/image/profile/3m.png"> 
                                        </div>
                                        <div class="item" data-value="4f">
                                            <img class="ui avatar image" src="/common/image/profile/4f.png"> 
                                        </div>
                                        <div class="item" data-value="4m">
                                            <img class="ui avatar image" src="/common/image/profile/4m.png"> 
                                        </div>
                                        <div class="item" data-value="5f">
                                            <img class="ui avatar image" src="/common/image/profile/5f.png"> 
                                        </div>
                                        <div class="item" data-value="5m">
                                            <img class="ui avatar image" src="/common/image/profile/5m.png"> 
                                        </div>
                                        <div class="item" data-value="6f">
                                            <img class="ui avatar image" src="/common/image/profile/6f.png"> 
                                        </div>
                                        <div class="item" data-value="6m">
                                            <img class="ui avatar image" src="/common/image/profile/6m.png"> 
                                        </div>
                                        <div class="item" data-value="7f">
                                            <img class="ui avatar image" src="/common/image/profile/7f.png"> 
                                        </div>
                                        <div class="item" data-value="7m">
                                            <img class="ui avatar image" src="/common/image/profile/7m.png"> 
                                        </div>
                                        <div class="item" data-value="8m">
                                            <img class="ui avatar image" src="/common/image/profile/8m.png"> 
                                        </div>
                                        <div class="item" data-value="9m">
                                            <img class="ui avatar image" src="/common/image/profile/9m.png"> 
                                        </div>
                                      </div>
                                  </div>
                                </div>
                                </div>
                                
                                  
                                <div class="field">                                                               
                                <button type="submit" class="ui button blue">Aggiungi</button>  
                                </div>
                            </form>  
            </div>
            </div>           
        </div>
        <!--#include virtual="/common/component/footer.html" -->
    </body>
</html>
