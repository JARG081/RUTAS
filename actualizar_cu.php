<?php

include("conexion.php");

$fecha = $_GET['id'];

$query = pg_query($conect,"SELECT * FROM cubren WHERE fecha='$fecha'");

$consulta = pg_fetch_object($query);
?>

<!DOCTYPE html>
<html lang="es"></html>
<head>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Registro</title>
</head>
<body>
    <form action="actualizar_cu2.php" method="POST">
        <input type="hidden" name="cod_ruta_original" value="<?php echo $consulta->cod_r; ?>">
        <input type="hidden" name="cod" value="<?php echo $consulta->cod_r; ?>">
        <input type="text" name="nombre" value="<?php echo $consulta->nomb_r; ?>">
        <input type="time" name="hora"  max="17:00" min="5:00" step="1" value="<?php echo $consulta->hora_salida; ?>">      
        <button type="submit">Actualizar Datos</button>
    </form>
</body>
</html>