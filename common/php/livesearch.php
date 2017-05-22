
<?php
    //Require engine PHP page
    require 'engine.php';
    //Prepare response for JS
    header('Content-Type: application/json');
    $data = array();
    // Escape user inputs for security
    $term = mysqli_real_escape_string($connection, filter_input(INPUT_GET, "q"));
    
    $result = query("SELECT v.titolo as titoloVideo, m.nome as nomeMateria, v.VideoID as vId, LOCATE('$term', v.Titolo) as score FROM video v,materia m WHERE v.CodMateria = m.Cod AND v.Titolo LIKE '%$term%' ORDER BY score LIMIT 3 ");
    
    if(mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            $suggestion = array(
                "vId" => $row["vId"],
                "titolo" => $row["titoloVideo"],
                "materia" => $row["nomeMateria"]
            );
            array_push($data, $suggestion);
        }
        connection_close();
    }
    
    echo json_encode($data);