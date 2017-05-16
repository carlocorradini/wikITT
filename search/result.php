<?php 
    session_start();
    require '../common/php/engine.php';
    $connection = null;
    connect($connection);
?>
<head>
    <title>Risultati ricerca</title>
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
    <!--Popup-->
    <link rel="stylesheet" type="text/css" href="/common/framework/mfb/mfb.min.css">
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <script src="/common/framework/mfb/mfb.min.js" type="text/javascript"></script>
    <!--END Framweworks-->
</head>
<style>
    
    
    
    
    /*Livesearch */
    #livesearch{
        width: 600px!important;
        vertical-align: central;
        max-width: 100%;
        margin: auto!important;
        text-align: left;             
        border-radius: .28571429rem;
        display: none;
        font-family: Lato,'Helvetica Neue',Arial,Helvetica,sans-serif;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.14);
        z-index: 2;
        position: absolute;
        margin-left: auto;
        margin-right: auto;
        left: 0;
        right: 0;
        opacity: 0.98;
    }
    #livesearch .suggestion {
        margin: 0;
        padding: 0;
    }
    #livesearch .suggestion li {
        background-color: #ffffff;
        list-style: none;
        padding: 7px;
        transition:background 0.2s;
        display: flex;
        justify-content: space-between;
    }
    #livesearch .suggestion li:hover { background-color:  #f1f1f1;}
    #livesearch .suggestion li a {
        text-decoration: none;
        color: black;
        width: 100%;
        cursor: default;
        margin-left: 12px;
    }
    #search-form .ui.icon.input,
        #tab {
            position: relative;
            width: 600px;
            vertical-align: middle;
            max-width: 100%;
        }
    /*Form*/
    #search-form {
        margin-top: 20px;
        text-align: center;
        position: relative!important;

    }
    .ui.items.bordo{
        margin-bottom: 1em!important;  
    }
    .bordo {
        
        padding: 1em;
        border-radius: 3px;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        box-shadow: 0 1px 3px rgba(0,0,0,0.2), 0 1px 2px rgba(0,0,0,0.3);
        -webkit-box-shadow: 0 1px 3px rgba(0,0,0,0.2), 0 1px 2px rgba(0,0,0,0.3);
        -moz-box-shadow: 0 1px 3px rgba(0,0,0,0.2), 0 1px 2px rgba(0,0,0,0.3);
    }
</style>
<script>
    function showResult(str) {
        var liveSearch = document.getElementById("livesearch");
        $(liveSearch).empty();

        if (str.length === 0) { 
            liveSearch.innerHTML="";
            liveSearch.style.display="none!important";
            return;
        }
        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState === 4 && this.status === 200) {
                $(liveSearch).empty();
                createSuggestion(JSON.parse(this.response));
            }
        };
        xmlhttp.open("POST","../common/php/livesearch.php?q="+str,true);
        xmlhttp.send();
    }

    function createSuggestion(data){
        var liveSearch = document.getElementById("livesearch");
        var ul = document.createElement("ul");
        ul.setAttribute("class", "suggestion");

        if(data.length > 0) {
            for(var i=0; i<data.length; i++) {
                var li = document.createElement("li");
                var a = document.createElement("a");
                a.setAttribute("href", 'http://localhost/informatica/index.php?v='+data[i].vId);
                a.innerHTML = "<b>"+data[i].titolo+"</b>";
                var span = document.createElement("span");
                span.innerHTML = " - <i>"+data[i].materia+"</i>";
                a.appendChild(span);
                li.appendChild(a);
                ul.appendChild(li);
            }
        } else {
            var li = document.createElement("li");
            li.style.fontWeight = "bold";
            li.innerHTML = "Nessun video trovato";
            var i = document.createElement("i");
            i.setAttribute("class", "rocket icon");
            li.appendChild(i);
            ul.appendChild(li);
        }
        liveSearch.appendChild(ul);
    }
    function checkSubmit(e) {
        if(e && e.keyCode === 13 && document.getElementById('cerca-result').value()!== null && document.getElementById('cerca-result').value()!== "") {
           document.getElementById('cerca-result').submit();
        }
    }    
</script>
<html>
    <div class="wrapper">
    <!--#include virtual="../common/component/header.html" -->
    <form id="search-form" action="#" method="post">
        <div class="ui icon input huge">
            <input id="cerca-result" name='cerca-result' type="text" value="<?php 
            if(isset($_REQUEST['search'])){
                echo $_REQUEST['search'];
                }else{ 
                    if(isset($_REQUEST['cerca-result'])){
                        echo $_REQUEST['cerca-result'];
                    }else{ 
                        echo $_SESSION['lastSearch'];
                    }
                    
                }?>" placeholder="Cerca..." autocomplete="off" onkeyup="showResult(this.value)" onfocus="showResult(this.value);" onkeydown="checkSubmit()">
            <i class="circular search link icon"></i>
        </div>
        <div id="livesearch" style="display: block;"></div>
    </form>


   
</html>


<?php
if(isset($_REQUEST['search'])){
    
    $term = $_REQUEST['search'];
    $_SESSION['lastSearch'] = $term;   
    printResult($term);
}else{
    if(isset($_REQUEST['cerca-result'])){
        $term = $_REQUEST['cerca-result'];
        $_SESSION['lastSearch'] = $term;   
        printResult($term);
    }else{
    printResult($_SESSION['lastSearch']);
    }
}

?>


<?php

    //mettere engine
    function stampaStat($VideoID){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, 'https://www.googleapis.com/youtube/v3/videos?part=statistics&id='.$VideoID.'&key=AIzaSyD0BBciTgJ2cBLphgjwIVYtxZ6Ey9UDpTA');
        $result = curl_exec($ch);
        curl_close($ch);

        $obj = json_decode($result);
        return $obj;
    }
    function printResult($term){
        
        $color;
        $result = query("SELECT DISTINCT v.VideoID, v.Descrizione, m.nomeIndirizzo as materia, v.Titolo as titoloVideo, v.Cod, v.DataPub FROM (SELECT v1.VideoID, v1.DataPub, v1.Titolo, v1.CodMateria, v1.Cod, v1.Descrizione, LOCATE('%$term', v1.Titolo) as score FROM video v1 WHERE v1.Titolo LIKE '%$term%' ORDER BY score) v, materia m WHERE v.CodMateria = m.Cod");
        
        if(mysqli_num_rows($result) > 0){
            while ($row = mysqli_fetch_array($result)){
                switch ($row['materia']) {
                    case 'Informatica':
                      $color='blue';
                      break;
                    case 'Meccanica':
                      $color='green';
                      break;
                    case 'Elettrotecnica':
                      $color='orange';
                      break;
                    case 'Costruzioni':
                      $color='brown';
                      break;
                    case 'Chimica':
                      $color='red';
                      break;
                }  
                 
                $vid = $row['Cod'];
                $resultautori = query("SELECT DISTINCT a.Nome as nomeAutore, a.Cognome as cognomeAutore, a.ID as idAutore FROM autore a, realizza r WHERE r.CodVideo ='$vid' AND a.ID = r.IDAutore");
                ?>
                
                <div class=' container'>
                <div class="ui items bordo" style="cursor: pointer;" onclick="window.location='http://localhost/informatica/index.php?v=<?php echo $row['VideoID'];?>'" > 
                    <div class="item">
                        <div class="image">
                            <img src="https://img.youtube.com/vi/<?php echo $row['VideoID']; ?>/sddefault.jpg">    
                        </div>
                    
                    
                        
                        <?php /*
                        <div class="categoria-autore">
                            <?php
                            echo "<i class='users icon'></i>";
                            if(mysqli_num_rows($resultautori) > 0){
                                while ($rowautori = mysqli_fetch_array($resultautori)){?>
                                    <a style='margin-left: 4px;' href="../author/index.php?a=<?php echo $rowautori['idAutore'];?>"><?php echo $rowautori['nomeAutore']." ".$rowautori['cognomeAutore'];?> </a>
                                    <?php
                                }
                            }
                            ?> 
                        </div>
                        
                         */?>
                        

                        <div class="content">
                            <h2><a class="header" href="#"><?php echo $row['titoloVideo']?></a></h2>                       
       
                            <div class="description">
                                <p><?php echo $row['Descrizione'];?></p>
                            </div>
                            <div class="extra">
                                <div class="ui label">
                                    <i class="calendar icon"></i>
                                    <?php echo $row["DataPub"]?>
                                </div>
                                <div class="ui teal label">
                                    <span><?php echo number_format(stampaStat($row['VideoID'])->items[0]->statistics->viewCount, 0, ',', '.');?></span> Visualizzazioni
                                </div>
                                
                                <div class="ui <?php echo $color?> label"><?php echo $row['materia']?></div>
                            </div>
                        </div>
                        
                        
                    </div>
                </div>
                </div>

        <?php
            }
        }   
}





?>
    </div>
    <!--#include virtual="/common/component/footer.html" -->
</html>

