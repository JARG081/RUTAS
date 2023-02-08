<?php 

    include("conexion.php");

    $cedula = $_POST['ced'];
    $nomb = $_POST['nomb'];
    $ape = $_POST['ape'];
    $edad = $_POST['edad'];

    if($edad>=18)
    {
        $sql_1 = "UPDATE conductores SET nomb_c='$nomb',ape_c='$ape',edad=$edad where cedula=$cedula";
        $query_1=pg_query($sql_1);
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
