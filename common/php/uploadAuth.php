<?php
    //Require engine PHP page
    require 'engine.php';
    //Prepare response for JS
    header('Content-Type: application/json');
    $data = array(
        "status" => null,
        "message" => null
    );
    //Dati
    $nome = filter_input(INPUT_GET, "Nome");
    $cognome = filter_input(INPUT_GET, "Cognome");
    $classe = filter_input(INPUT_GET, "Classe");
    $annoS = filter_input(INPUT_GET, "AnnoS");
    $gender = filter_input(INPUT_GET, "gender");
    $colore = filter_input(INPUT_GET, "colore");
    $icona = filter_input(INPUT_GET, "icona");
    
    
    if($gender=="M") {
        
    }
    else if ($gender=="F") {
    
    }
    
    $result = query("INSERT INTO autore VALUES ('$nome', '$cognome', '$classe', '$annoS', '$gender', '$icona', '$colore');");
    setResponse($data, TRUE, "Author inserted correctly!");
    
    echo json_encode($data);
