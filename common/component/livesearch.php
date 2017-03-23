<?php

?>
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
require '../php/engine.php';
$connection=null;
connect($connection);
// Escape user inputs for security
$term = mysqli_real_escape_string($connection, $_REQUEST['q']);
$ris = mysqli_query($connection, "SELECT v.titolo as titoloVideo, m.nome as nomeMateria, v.VideoID as link FROM video v,materia m WHERE v.CodMateria = m.Cod AND v.Titolo LIKE '$term%' LIMIT 3");

  

if(mysqli_num_rows($ris) > 0){

    echo "<ul class='suggestion'>";
        while($row = mysqli_fetch_array($ris)){
            //HTML_ENTITY_DECODE()
            $stringa = ucfirst($row['titoloVideo']);
            $term = ucfirst(strtolower($term));
            $completamento = str_replace($term, "", $stringa);
            echo "<li><a href=https://www.youtube.com/watch?v=".$row['link'].">".$term."<b>".strtolower($completamento)."</b><i style='font-size: 13px;'> - ".$row['nomeMateria']."</i></a></li>";
        }
    echo "</ul>";
    // Close result set
    mysqli_free_result($ris);
    }else{
        echo "<ul class='suggestion'>";
            echo "<li><a>Nessun risultato trovato</a></li>";
        echo "</ul>";
    }
?>
