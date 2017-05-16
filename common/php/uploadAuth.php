<?php
    //Require engine PHP page
    require 'engine.php';
    //Inizio sessione amministratore
    session_start();
    //Prepare response for JS
    header('Content-Type: application/json');
    $data = array(
        "status" => null,
        "message" => null
    );
    //Dati
    $nome = filter_input(INPUT_POST, "Nome");
    $cognome = filter_input(INPUT_POST, "Cognome");
    $classe = filter_input(INPUT_POST, "Classe");
    $annoS = filter_input(INPUT_POST, "AnnoS");
    $gender = filter_input(INPUT_POST, "gender");
    $colore = filter_input(INPUT_POST, "colore");
    $icona = filter_input(INPUT_POST, "icona");  
    $nomeAmm = getUsername();
    
    /*if($gender=="M") {
        
    }
    else if ($gender=="F") {
    
    }*/
    
    
    $result = query("INSERT INTO autore(Nome, Cognome, Classe, AnnoS, Sesso, Miniatura, Colore) VALUES ('$nome', '$cognome', '$classe', '$annoS', '$gender', '$icona', '$colore');");
    setResponse($data, TRUE, "Author inserted correctly!");

    echo json_encode($data);
