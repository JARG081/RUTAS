<?php 

    include("conexion.php");

    $original = $_POST['cod_ruta_original'];
    $nomb = $_POST['nombre'];
    $hora = $_POST['hora'];
    $horai="5:00:00";
    $horaf="19:00:00";
$inputTimestamp = strtotime($hora);
        $startTimestamp = strtotime($horai);
        $endTimestamp = strtotime($horaf);

    if ($inputTimestamp>=$startTimestamp && $inputTimestamp<=$endTimestamp) 
        {
            
                $sql="UPDATE rutas SET nomb_r='$nomb',hora_salida='$hora' 
                where cod_r=$original";
                $query=pg_query($conect, $sql);
                include_once "rutas.php";
                               echo '<script> Swal.fire({
                                icon: "success",
                                title: "REALIZADO",
                                text: "Datos actualizados satisfactoriamente",
                              });</script>';
                
        }
        else 
        {
        
        echo '<script> Swal.fire({icon: "error", title: "Error!",         
        text: "HORA RUTA INVALIDO"});
        </script>'; 
        include_once "rutas.php";
        }

?>
