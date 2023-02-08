<?php

include("conexion.php");

$placa=$_GET['id'];

$query1=pg_query($conect,"SELECT COUNT(*) FROM manejan where placa=$placa");
$query2= pg_fetch_result($query1, 0, 0);
$query3=pg_query($conect,"SELECT COUNT(*) FROM cubren where placa=$placa");
$query4= pg_fetch_result($query3, 0, 0);



if($query4<=0)
{
    if($query2<=0)
    {
        $sql="DELETE FROM buses  WHERE placa=$placa";
        $query=pg_query($sql);
        include_once "buses.php";
                               echo '<script> Swal.fire({
                                icon: "success",
                                title: "REALIZADO",
                                text: "Bus eliminada satisfactoriamente",
                              });</script>';
    }
    else
    {
        include_once "buses.php";
        echo '<script> Swal.fire({icon: "error", title: "Error!",         
            text: "Este bus está asignado a un conductor actualmente"});
            </script>'; 
    }
}
else
{
    include_once "buses.php";
        echo '<script> Swal.fire({icon: "error", title: "Error!",         
            text: "Este bus cubre una ruta actualmente"});
            </script>'; 
}
?>