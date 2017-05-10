<?php

    require './engine.php';
    $data = array(
            "status" => null,
            "message" => null
    );
    
    //Ricevi DATI
    $nome = filter_input(INPUT_GET, "Nome");
    $cognome = filter_input(INPUT_GET, "Cognome");
    $classe = filter_input(INPUT_GET, "Classe");
    $annoS = filter_input(INPUT_GET, "AnnoS");
    $gender = filter_input(INPUT_GET, "gender");
    $colore = filter_input(INPUT_GET, "colore");
    if($gender="M"){
        
    }
    elseif ($gender="F") {
    
    }
    $icona = filter_input(INPUT_GET, "icona");
    
    $result = query("INSERT INTO autore VALUES ('$nome', '$cognome', '$classe', '$annoS', '$gender', '$icona', '$colore');");
    setResponse(TRUE, "Author inserted correctly!");
    
     function setResponse($status = null, $message = null) {
        global $data;
        $data["status"] = $status;
        $data["message"] = $message;
    }
    
   echo json_encode($data);
    
    
?>
