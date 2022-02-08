<?php
require "config.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORMULARIO VOTACION DESIS</title>
    <link rel="stylesheet" href="./css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" 
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" 
    crossorigin="anonymous">
    </script>
</head>
<body>
    <div class="container">
    <h3>FORMULARIO DE VOTACION</h3>
    <p id="respuesta"></p>
    <form id="formVotacion">
        <div class="form-group">
            <label for="nombre">Nombre y apellido</label>
            <input type="text" name="nombre">
        </div>
        <div class="form-group">
            <label for="alias">Alias</label>
            <input type="text" name="alias" >
        </div>
        <div class="form-group">
            <label for="rut">RUT</label>
            <input type="text" name="rut" placeholder="12345678-0" >
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" >
        </div>
         <div class="form-group">
            <label for="region">Region</label>
            <select name="region" id="region">
                <option value="">Escoger...</option>
                <?php
                $psql = "SELECT * FROM region ORDER BY region";
                $result = pg_query($conn, $psql);
                while ($row = pg_fetch_row($result)) {   
                    echo '<option value='.$row[0].'>'.$row[1].'</option>';
                }?>
            </select>
         </div>   
         <div class="form-group">
            <label for="comuna">Comuna</label>
            <select name="comuna" id="comuna">
                <option value="">Escoger...</option>
            </select>
         </div>
         <div class="form-group">
            <label for="candidato">Candidato</label>
            <select name="candidato" id="candidato">
                <option value="">Escoger...</option>
            </select>
         </div>
        <div>
            <label for="info">Como se enteró de nosotros:</label>
            <label for="web">Web</label>
            <input type="checkbox" name="web" id="">
            <label for="web">Tv</label>
            <input type="checkbox" name="tv" id="">
            <label for="web">Redes Sociales</label>
            <input type="checkbox" name="redes" id="">
            <label for="web">Amigo</label>
            <input type="checkbox" name="amigo" id="">
        </div>
        <button type="submit" id="btnInsert" class="btn">VOTAR</button>
    </form>
</div>

<script type="text/javascript">

    

$( "form" ).on( "submit", function( event ) {
    event.preventDefault()
    const url = 'insertar.php'
    $.ajax({
        type:'POST',
        url,
        data:($( this ).serialize() ),
        success:function(data){
            $("#respuesta").append(`<p id="error">${data}</p>`)
            console.log(data);
            setTimeout(() => {
                $("#error").remove() 
            }, 3000);
        }
    });
    return false;
});

    $(function(){
        $('#region').on('change', function() {
            let idRegion = $('#region').val();
            let url = "comuna.php";
            $.ajax({
                type: 'POST',
                url,
                data:'idRegion='+idRegion,
                success:function(data){
                    $("#comuna option").remove();
                    $("#comuna").append(data);
                }
            });
            return false
        })
    })

    $(function(){
        $('#region').on('change', function() {

            let idRegion = $('#region').val();
            let url = "candidato.php";
            $.ajax({
                type: 'POST',
                url,
                data:'idRegion='+idRegion,
                success:function(data){
                    $("#candidato option").remove();
                    $("#candidato").append(data);
                }
            });
            return false
        })
    })
</script>

</body>
</html>