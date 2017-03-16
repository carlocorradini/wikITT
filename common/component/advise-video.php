
<head>
    <style>
        .card{
            width: 225px!important;
            display: inline-block!important;
        }
        #contenitore-4{
            margin-top: 100px!important;
            width: 1000px;
            vertical-align: middle;
            max-width: 100%;
            margin:auto;
        }
        
    </style>
    
    
</head>   

<div class="ui stackable four column grid" id="contenitore-4"> 
<?php
$numeroVideo = 8;
for($i=0; $numeroVideo>$i;$i++){
?>
    <div class="column">
        <div class="ui card">

          <div class="image">
              <div class="ui green ribbon label">Materia</div>
            <img src="/common/image/prova.jpg">
          </div>
          <div class="content">
              <div><h2>Titolo video</h2></div>
            <div class="description">
              Autori | descrizione | categoria 
            </div>
          </div>
            <div class="extra content">
                <a>
                    <i class="users icon"></i>
                    Autori
                </a>
            </div>
        </div>    
    </div>
<?php
}
?>
</div>