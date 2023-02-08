<?php 

    include("conexion.php");

    $cedula = $_POST['ced'];
    $nomb = $_POST['nomb'];
    $ape = $_POST['ape'];
    
    $query_fecha = pg_query($conect, "SELECT fecha_nacimiento FROM conductores WHERE cedula = $cedula");
    $result_fecha = pg_fetch_assoc($query_fecha);
    $fecha_nac = $result_fecha['fecha_nacimiento'];
    
    $sql_update = "UPDATE conductores SET nomb_c='$nomb',ape_c='$ape',fecha_nacimiento='$fecha_nac' WHERE cedula=$cedula";
    $query_update = pg_query($conect, $sql_update);
    
    if($query_update)
    {
        
        include_once "conductores.php";
                               echo '<script> Swal.fire({
                                icon: "success",
                                title: "REALIZADO",
                                text: "Datos actualizados satisfactoriamente",
                              });</script>';
    }

else
{
    include_once "conductores.php";
                               echo '<script> Swal.fire({
                                icon: "error",
                                title: "Error!",
                                text: "EDAD INVALIDA",
                              });</script>';
}
?>
