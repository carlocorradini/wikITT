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
?>
<script>
    function showResult(str) {
      if (str.length==0) { 
        document.getElementById("livesearch").innerHTML="";
        document.getElementById("livesearch").style.border="0px";
        return;
      }
      if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
      } else {  // code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
      }
      xmlhttp.onreadystatechange=function() {
        if (this.readyState==4 && this.status==200) {
          document.getElementById("livesearch").innerHTML=this.responseText;
          document.getElementById("livesearch").style.border="1px solid #A5ACB2";
        }
      }
      xmlhttp.open("GET","livesearch.php?q="+str,true);
      xmlhttp.send();
    }
</script>
<?php 
connessione();
// Escape user inputs for security
$term = mysqli_real_escape_string($connetti, $_REQUEST['q']);
$ris = mysqli_query($connetti, "SELECT video.titolo FROM wikitt.video WHERE titolo LIKE '$term%' LIMIT 3");
if(mysqli_num_rows($ris) > 0){
    
        while($row = mysqli_fetch_array($ris)){
            echo "<p>" . $row['titolo'] . "</p>";
        }
   
    // Close result set
    mysqli_free_result($ris);
    }else{
        echo "<p>Nessun risultato trovato</p>";
    }
?>

