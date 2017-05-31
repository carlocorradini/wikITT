<?php
    require 'engine.php';
    //Inizio sessione amministratore
    session_start();
    
    header('Content-Type: application/json');
    $data = array(
        "status" => null,
        "message" => null
    );

    $VideoID = filter_input(INPUT_POST, "videoID");
    //ALTRE VARIABILI: materia e autori
    $materia = filter_input(INPUT_POST, "materia");
    $autori = filter_input(INPUT_POST, "autori");
    
    
    
    $apikey = "AIzaSyD0BBciTgJ2cBLphgjwIVYtxZ6Ey9UDpTA";
    $url = "https://www.googleapis.com/youtube/v3/videos?id=$VideoID&key=$apikey&fields=items(snippet(channelId,title,categoryId,description))&part=snippet";
            
                
    function getVideoStat() {
        global $url;
        
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_URL, $url);
                $result = curl_exec($ch);
                curl_close($ch);
                return json_decode($result);
            }
            
    $stat = getVideoStat();
    $autori_array=  explode(",", $autori);
    $numAutori = count($autori_array);
    //echo 'funziona: ' .$num ." ". $autori_array[0];
    $date = date('Y');
    
    
    $cod = query("SELECT Cod FROM video WHERE CodMateria='$materia' AND year(video.DataPub) = $date ORDER BY Cod DESC LIMIT 1;");
    if(mysql_num_rows($result)==0){
        $codint=001;
    }
    else {
        $cod = substr($cod, 4, 3);
        $cod++;
        $lung = strlen((string)$cod);
        if($lung==1){
                $cod= "00" .$cod;
        }
        if($lung==2){
                $cod= "0" .$cod;
        }
   }
    
    //echo 'funziona:'. $stat->items[0]->snippet->description;
    $titolo = $stat->items[0]->snippet->title;
    $descrizione = $stat->items[0]->snippet->description;
    
    $nomeAmm = getUsername();
    
    $cod++;
    $lung = strlen((string)$cod);
    if($lung==1){
            $cod= "00" .$cod;
    }
    if($lung==2){
            $cod= "0" .$cod;
    }
    
    $dataCompleta = date(Y-m-d);
    
  $codCompleto = "".$materia."".$cod."_".$date;
    /*
     * Dati necessari:
     * COD $codCompleto
     * Titolo $titolo
     * Descrizione $descrizione
     * VideoID $VideoID
     * CodMateria $materia
     * DataPub $dataCompleta
     * NomeAmm $nomeAmm
     * 
     * 
     * Autori $autori_array
     */        
  
    //INSERT VIDEO
    $result = query("INSERT INTO video(Cod, Titolo, Descrizione, VideoID, CodMateria, DataPub, NomeAmm) VALUES ('$codCompleto', '$titolo', '$descrizione', '$VideoID', '$materia', '$dataCompleta', '$nomeAmm');");
    if($result)
        setResponse($data, TRUE, "Video inserted correctly!");
    else 
       setResponse($data, FALSE, "Video not inserted correctly!");
    
    //INSERT REALIZZA
    for($i=0; $i<$numAutori; $i++){
        $result = query("INSERT INTO realizza(IDAutore, CodVideo) VALUES ('$autori_array[$i]', '$codCompleto');");
        if($result)
            setResponse($data, TRUE, "Author-Video inserted correctly!");
        else 
            setResponse($data, FALSE, "Author-Video not inserted correctly!");
    
    }
    
    echo json_encode($data);
?>