<?php
require "config.php";
require "validarRut.php";

$nombre = $_POST['nombre'];
$alias = $_POST['alias'];

$rut = $_POST['rut'];
$email = $_POST['email'];
$region = $_POST['region'];
$comuna = $_POST['comuna'];
$candidato = $_POST['candidato'];
$procedencia = 'Web';



// if($region == "" || $comuna == "" || $candidato == ""){
//     echo "No pueden quedar campos vacíos";
//     return false;    
// }
if(strlen($alias) < 5 || $alias == ""){
    echo "El campo alias debe tener al menos 5 caracteres";
    return false; 
}if(preg_match('/^[a-zA-Z0-9]+$/', $alias)){
    echo $alias."El campo debe contener letras y números";
    return false;
}
// if(validaRut($rut) == FALSE){
//         echo "Rut inválido. Debe ingresar un rut válido";
//         return false;
// }else{
//     $nombreRegion = "SELECT region FROM region WHERE id_region = $region";
//     $resultReg = pg_query($conn, $nombreRegion);
//     while ($rowReg = pg_fetch_array($resultReg)) { 
//         $region =  $rowReg[0]; 
//     }

//     $nombreComuna = "SELECT comuna FROM comuna WHERE id_comuna = $comuna";
//     $resultCom = pg_query($conn, $nombreComuna);
//     while ($rowCom = pg_fetch_array($resultCom)) {   
//         $comuna = $rowCom[0];
//     }

//     $nombreCandidato = "SELECT nombre FROM candidato WHERE id = $candidato";
//     $resultCand = pg_query($conn, $nombreCandidato);
//     while ($rowCand = pg_fetch_array($resultCand)) {
//         $candidato = $rowCand[0];  
//     }
// }

// $psqlInsert = "INSERT INTO votante (nombre, alias, rut, email, region, comuna,candidato,procedencia) 
//                 values('$nombre', '$alias', '$rut', '$email', '$region', '$comuna', '$candidato', '$procedencia')";

// $result = pg_query($conn, $psqlInsert);

// if($result){
//     echo "La inserción fue exitosa";

// }else{
//     echo $resultReg."No se pudo completar la inserción";
// }

// pg_close($conn);
?>