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
    $num = count($autori_array);
    echo 'funziona: ' .$num ." ". $autori_array[0];
    
    $cod = "INFO011_17";
    $cod = substr($cod, 4, 3);
    $codint = filter_var($cod, FILTER_SANITIZE_NUMBER_INT);
    //echo 'funziona:'. $stat->items[0]->snippet->description;
    
    $cod++;
    $lung = strlen((string)$cod);
    if($lung==1){
            $cod= "00" .$cod;
    }
    if($lung==2){
            $cod= "0" .$cod;
    }
    
    $codCompleto = "".$materia."".$cod."_".date("y");
    
    
            
    echo 'cod: '.$codCompleto;
    
?>