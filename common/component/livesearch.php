<?php
    //Require engine PHP page
    require '../php/engine.php';
    //Prepare response for JS
    header('Content-Type: application/json');
    $data = array(
        "link" => null,
        "titolo" => null,
        "nomeMateria" => null
    );
    // Escape user inputs for security
    $term = mysqli_real_escape_string($connection, filter_input(INPUT_GET, "q"));
    $result = mysqli_query($connection, "SELECT v.titolo as titoloVideo, m.nome as nomeMateria, v.VideoID as link, LOCATE('$term', v.Titolo) as score FROM video v,materia m WHERE v.CodMateria = m.Cod AND v.Titolo LIKE '%$term%' ORDER BY score LIMIT 1 ");
    if(mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            $data["link"] = $row["link"];
            $data["titolo"] = $row["titoloVideo"];
            $data["nomeMateria"] = $row["nomeMateria"];
        }
        /*echo "<ul class='suggestion'>";
            while($row = mysqli_fetch_array($ris)){
                //HTML_ENTITY_DECODE()
                $stringa = ucfirst($row['titoloVideo']);
                $term = ucfirst(strtolower($term));
                $completamento = str_replace($term, "", $stringa);
                echo "<li><a href=https://www.youtube.com/watch?v=".$row['link'].">".$term."<b>".strtolower($completamento)."</b><i style='font-size: 13px;'> - ".$row['nomeMateria']."</i></a></li>";
                
                echo "<li><a href=https://www.youtube.com/watch?v=".$row['link'].">".$row['titoloVideo']."<i style='font-size: 13px;'> - ".$row['nomeMateria']."</i></a></li>";
            }
        echo "</ul>";
    } else {
        /*
        <ul class='suggestion'>
            <li><a>Nessun risultato trovato</a></li>
        </ul>
        */
    }
    echo json_encode($data);