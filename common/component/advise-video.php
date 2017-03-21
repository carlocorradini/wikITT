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
/*
function randomGen($min, $max, $quantity) {
    $numbers = range($min, $max);
    shuffle($numbers);
    return array_slice($numbers, 0, $quantity);
}
*/
?>

<style>
    .card{
        width: 225px!important;
        display: inline-block!important;
    }
    #contenitore-4{
        margin-top: 100px!important;
        width: 1000px;
        vertical-align: middle;
        max-width: 100%;
        margin:auto;
    }

</style>
<div class="ui stackable four column grid" id="contenitore-4"> 
    <?php
        //connessione database
        connessione();
        //variabili per stampa card 
        $nVideoDB = 0;
        $nVideo = 8; 
        $risCount = mysqli_query($connetti, "SELECT COUNT(*) AS 'numeroVideo' FROM wikitt.video") or die (mysqli_error($connetti));
        if(mysqli_num_rows($risCount) > 0){
            while($row=mysqli_fetch_array($risCount)){
                $nVideoDB = $row['numeroVideo'];
            }
        }
        if($nVideoDB<8){
            $nVideo = $nVideoDB;
        }
        $risRand = mysqli_query($connetti, "SELECT DISTINCT m.nome as materia, v.titolo as titoloVideo, v.descrizione as descrizioneVideo, a.nome as nomeAutore, a.cognome as cognomeAutore, v.pathMiniatura FROM video v, materia m, autore a, realizza r WHERE v.CodMateria = m.Cod AND a.ID = r.IDAutore AND v.Cod = r.CodVideo ORDER BY RAND() LIMIT 8") or die (mysqli_error($connetti));      
        if(mysqli_num_rows($risRand) > 0){
            for($i=0;$nVideo>$i;$i++){ 
                while($row=mysqli_fetch_array($risRand)){       
                ?>
                    <div class="column">
                        <div class="ui card">

                            <div class="image">
                                <div class="ui green ribbon label"><?php echo $row['materia']?></div>
                            <img src="<?php echo $row['pathMiniatura']?>">
                        </div>
                        <div class="content">
                            <div><h2><?php echo $row['titoloVideo']?></h2></div>
                            <div class="description">
                                <?php echo $row['descrizioneVideo']?>
                            </div>
                        </div>
                            <div class="extra content">
                                <a>
                                    <i class="users icon"></i>
                                    <?php echo $row['nomeAutore']." ".$row['cognomeAutore']?>
                                </a>
                            </div>
                        </div>    
                    </div>
                <?php
                }
            }
        }
        ?>
    
</div>