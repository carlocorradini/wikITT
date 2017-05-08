<?php 
//includere header
//includere livesearch 
?>
<style>
    .floating-box{
        float:left;
    }
    .miniatura{
        //centrare verticalmente
    }
    .line{
        width: 80%;
        margin:auto;
        height: 200px;
        border-top:#000000 solid 1px;
        
        border-bottom:#000000 solid 1px;
    }
</style>
<?php
require '../php/engine.php';
//far passare term
//includere coso autori
$result = query("SELECT v.titolo as titoloVideo, m.nome as nomeMateria, v.VideoID as vId, v.Descrizione as descrizione, LOCATE('$term', v.Titolo) as score 
FROM video v,materia m 
WHERE v.CodMateria = m.Cod AND v.Titolo LIKE '%$term%' 
ORDER BY score");
if(mysqli_num_rows($result) > 0){
    while ($row = mysqli_fetch_array($result)) {?>
        <div class="line">
            <div class="floating-box miniatura">
                <img src="https://img.youtube.com/vi/<?php echo $row['VideoID']?>/sddefault.jpg">
            </div>
            <div class="floating-box">
                <p>Categoria e autore</p>
                <!-- titolo -->
                <div class="content">
                    <div><h2><a href="#"><?php echo $row['titoloVideo']?></a></h2></div>                        
                </div>
                <p>Descrizione</p>
                <!-- le visite le prendi con l'API -->
                <p>Visite</p>
            </div>


        </div>


<?php}
}


