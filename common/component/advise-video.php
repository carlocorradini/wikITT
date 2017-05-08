
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
        require '../php/engine.php';
        $connection = null;
        //connessione database
        connect($connection);
        //variabili per stampa card 
        $nVideoDB = 0;
        $nVideo = 8; 
        $risCount = mysqli_query($connection, "SELECT COUNT(*) AS 'numeroVideo' FROM video") or die (mysqli_error($connection));
        $risRand = mysqli_query($connection, "SELECT DISTINCT v.VideoID, m.nomeIndirizzo as materia, v.titolo as titoloVideo, a.nome as nomeAutore, a.cognome as cognomeAutore, a.id as idAutore FROM video v, materia m, autore a, realizza r WHERE v.CodMateria = m.Cod AND a.ID = r.IDAutore AND v.Cod = r.CodVideo ORDER BY RAND() LIMIT 8 ") or die (mysqli_error($connetti));      

        if(mysqli_num_rows($risRand) > 0){
                while($row=mysqli_fetch_array($risRand)){
                  switch ($row['materia']) {
                    case 'Informatica':
                      $color='blue';
                      break;
                    case 'Meccanica':
                      $color='green';
                      break;
                    case 'Elettrotecnica':
                      $color='orange';
                      break;
                    case 'Costruzioni':
                      $color='brown';
                      break;
                    case 'Chimica':
                      $color='red';
                      break;
                  }
                ?>
                <div class="column">
                    <div class="ui card <?php echo $color?>">
                        <a class="image">
                            <div class="ui <?php echo $color?> ribbon label"><?php echo $row['materia']?></div>
                            
                            <img src="https://img.youtube.com/vi/<?php echo $row['VideoID']?>/sddefault.jpg">
                        </a>
                    <div class="content">
                        <div><h2><a href="#"><?php echo $row['titoloVideo']?></a></h2></div>
                        
                    </div>
                        <div class="extra content">
                            <a href="/author/index.php?a=<?php echo $row['idAutore'];?>">
                                <i class="users icon"></i>
                                <?php echo $row['nomeAutore']." ".$row['cognomeAutore']?>
                            </a>
                        </div>
                    </div>
                </div>
                <?php
                }
            }
        ?>
</div>
