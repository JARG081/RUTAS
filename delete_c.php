<?php

include("conexion.php");

$cedula=$_GET['id'];

$query1=pg_query($conect,"SELECT COUNT(*) FROM manejan where cedula=$cedula");
$query2= pg_fetch_result($query1, 0, 0);



    if($query2<=0){
        $sql="DELETE FROM conductores  WHERE cedula=$cedula";
    $query=pg_query($sql);
        include_once "conductores.php";
                               echo '<script> Swal.fire({
                                icon: "success",
                                title: "REALIZADO",
                                text: "Conductor eliminado satisfactoriamente",
                              });</script>';
    }
    else
    {
        include_once "conductores.php";
                   echo '<script> Swal.fire({ icon: "error", title: "Error!",         
                   text: "El conductor está asignado a un bus",});
                   </script>'; 
    }
?>