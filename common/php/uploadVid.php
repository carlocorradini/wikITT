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
    //ALTRE VARIABILI
    
    
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
    
    echo 'funziona:'. $stat->items[0]->snippet->title;
    
?>