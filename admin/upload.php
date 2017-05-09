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
            });
        </script>
        <div class="wrapper">
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
                                    <div class="ui selection dropdown">
                                    <input type="hidden" name="gender">
                                    <i class="dropdown icon"></i>
                                    <div class="default text">Sesso</div>
                                    <div class="menu">
                                      <div class="item" data-value="male" data-text="Male">
                                        <i class="male icon"></i>
                                        Maschio
                                      </div>
                                      <div class="item" data-value="female" data-text="Female">
                                        <i class="female icon"></i>
                                        Femmina
                                      </div>
                                    </div>
                                  </div>
                                </div>
                  
                                <!-- Immagine -->
                                <div class="field">
                                    <label>Miniatura autore</label>
                                        <select>
                                            <option value="volvo" style="background-image:url(/common/image/profile/1f.png);">Volvo</option>
                                            <option value="saab"  style="background-image:url(/common/image/profile/1m.png);">Saab</option>
                                            <option value="honda" style="background-image:url(/common/image/profile/2f.png);">Honda</option>
                                            <option value="audi"  style="background-image:url(/common/image/profile/2m.png);">Audi</option>
                                        </select>
                                </div>
                                
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
                                          Blu
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
                                <button type="submit" class="ui button">LOGIN</button>  
                                </div>
                            </form>
                        </div>
                        <div class="col-sm-4"></div>
                    </div>
                </div>
        </div>           
        </div>
        <!--#include virtual="/common/component/footer.html" -->
    </body>
</html>
