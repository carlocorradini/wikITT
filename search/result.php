<?php 
//includere header
//includere livesearch 
?>
<head>
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
    .floating-box{
        float:left;
    }
    .miniatura{
        height:80%;
        vertical-align: central;
        margin: auto!important;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.14);
    }
    .line{
        width: 60%!important;
        margin:auto;
        height: 25%;
    }
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
    .card {
                position: relative;
                width: 100%;
                min-height: 100px;
                margin-top: 1em;
                padding: 1em;
                border-radius: 3px;
                -webkit-border-radius: 3px;
                -moz-border-radius: 3px;
                box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
                -webkit-box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
                -moz-box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
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
                a.setAttribute("href", "https://www.youtube.com/watch?v="+data[i].vId);
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
</script>
<html>
    <!--#include virtual="../common/component/header.html" -->
    <form id="search-form">
        <div class="ui icon input huge">
            <input id="cerca"  type="text" placeholder="Cerca..." autocomplete="off" onkeyup="showResult(this.value)" onfocus="showResult(this.value);">
            <i class="circular search link icon"></i>
        </div>
        <div id="livesearch" style="display: block;"></div>
    </form>
<?php
    require '../common/php/engine.php';
    $connection = null;
    //connessione da
    //tabase
    connect($connection);
    //far passare term
    //includere coso autori

    
    $result = query("SELECT DISTINCT v.VideoID, m.nomeIndirizzo as materia, v.titolo as titoloVideo, a.nome as nomeAutore, a.cognome as cognomeAutore, a.id as idAutore FROM (SELECT v1.VideoID, v1.Titolo, v1.CodMateria, v1.Cod FROM video v1 ORDER BY RAND() LIMIT 8) v, materia m, autore a, realizza r WHERE v.CodMateria = m.Cod AND a.ID = r.IDAutore AND v.Cod = r.CodVideo GROUP BY v.VideoID");
    if(mysqli_num_rows($result) > 0){
        while ($row = mysqli_fetch_array($result)) {?>
            <div class="line card">
                <div class="floating-box">
                    <img class="miniatura" src="https://img.youtube.com/vi/<?php echo $row['VideoID']?>/sddefault.jpg">
                </div>
                <div class="floating-box">
                    <p>Categoria e autore</p>
                    <!-- titolo -->
                    
                    <div class="content">
                        <div><h2><a href="#"><?php echo $row['titoloVideo']?></a></h2></div>                        
                    </div>
                    <p>Descrizione</p>
                    <!-- le visite le prendi con l'API -->
                    <p>Visite</p>
                </div>
            </div>
    <?php
        }
    }   
    ?>

   
</html>