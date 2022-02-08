<?php

$host = "localhost";
$dbname = "votacion";
$username = "mario";
$password = "1234";

// try {

    $conn = pg_connect("host=$host dbname=$dbname user=$username password=$password");
   
//     $result = pg_query($conn, "select * from region order by id_region");

//     echo "Conexion establecida"."<br>";
//     while ($row = pg_fetch_row($result)) {
//         echo "Dato 1: $row[0] Dato 2: $row[1]";
//         echo "<br />\n";
//     }
// } catch (PDOException $exp) {
//     echo ("Conexion erronea, $exp");
    
// }


?>