
<?php

function connessione(){
    global $connetti;
    $dbHost = "localhost";
    $dbName = "wikitt";
    $dbUser = "root";
    //$dbPass = "1234";
    
    $connetti = mysqli_connect($dbHost, $dbUser);
    if(!$connetti){
        die('connessione fallita: '. mysqli_error());
    }
    mysqli_select_db( $connetti, $dbName);

}
?>
<script>
    function showResult(str) {
      if (str.length==0) { 
        document.getElementById("livesearch").innerHTML="";
        document.getElementById("livesearch").style.border="0px";
        return;
      }
      if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
      } else {  // code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
      }
      xmlhttp.onreadystatechange=function() {
        if (this.readyState==4 && this.status==200) {
          document.getElementById("livesearch").innerHTML=this.responseText;
          document.getElementById("livesearch").style.border="1px solid #A5ACB2";
        }
      }
      xmlhttp.open("GET","livesearch.php?q="+str,true);
      xmlhttp.send();
    }
</script>
<style>
    .suggestion li {
      background:white;
      list-style: none;
      padding:7px;
      transition:background 0.2s;
      display:flex;
      justify-content:space-between;

    }
    li:hover {
      background:  #f1f1f1;
    }
    
    .suggestion {
        margin: 0;
        padding: 0;
      /*perspective:20px;*/
    }
    .suggestion li a{
        text-decoration: none;
        color: black;
        width: 100%;
        cursor: default;
        margin-left: 12px;

    }


    
</style>
<?php 
    connessione();
    // Escape user inputs for security
    $term = mysqli_real_escape_string($connetti, $_REQUEST['q']);
    $ris = mysqli_query($connetti, "SELECT v.titolo as titoloVideo, m.nome nomeMateria, v.link FROM video v,materia m WHERE v.codMateria = m.Cod AND v.titolo LIKE '$term%' LIMIT 3");
    if ($ris) {
        if(mysqli_num_rows($ris) > 0) {
            echo "<ul class='suggestion'>";
                while($row = mysqli_fetch_array($ris)){
                    //HTML_ENTITY_DECODE()
                    $stringa = ucfirst($row['titoloVideo']);
                    $term = ucfirst(strtolower($term));
                    $completamento = str_replace($term, "", $stringa);
                    echo "<li><a href=".$row['link'].">".$term."<b>".strtolower($completamento)."</b><i style='font-size: 13px;'> - ".$row['nomeMateria']."</i></a></li>";
                }
            echo "</ul>";
            // Close result set
            mysqli_free_result($ris);
        } else {
            echo "<ul class='suggestion'>";
            echo "<li><a>Nessun risultato trovato</a></li>";
            echo "</ul>";
        }
    }
?>
