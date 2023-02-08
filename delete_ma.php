<?php
session_start();
include_once("conexion.php");
$fec_i=$_GET['id'];
$fec_f=$_GET['name'];
$pla=$_GET['pla'];
$ced=$_GET['ced'];

$sql="DELETE FROM manejan  WHERE fecha_i='$fec_i' 
and fecha_f='$fec_f' and $pla=placa and $ced=cedula";
$query=pg_query($sql);

    if($query){
        include_once "manejan.php";
                               echo '<script> Swal.fire({
                                icon: "success",
                                title: "REALIZADO",
                                text: "Registro  Eliminado satisfactoriamente",
                              });</script>';
    }
    else
    {
        include_once "manejan.php";
        "buses.php";
                   echo '<script> Swal.fire({ icon: "error", title: "Error!",         
                   text: "Imposible eliminar el registro",});
                   </script>'; 
    }
?>

