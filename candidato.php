<?php

require "config.php";

$idRegion = $_POST['idRegion'];

if(isset($idRegion)){
 
    $psql = "SELECT * FROM candidato WHERE id_region = '$idRegion' ORDER BY candidato";
    $result = pg_query($conn, $psql);
    $count = pg_num_rows($result);

    if($count > 0) {
        echo '<option selected="selected">Escoger...</option>';
        while ($row = pg_fetch_row($result)) {   
            echo '<option value='.$row[0].'>'.$row[2].'</option>';
        }
    }
}

?>