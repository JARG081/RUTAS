<?php

include("conexion.php");

$cod_r=$_GET['id'];

$query1=pg_query($conect,"SELECT COUNT(*) FROM contienen where cod_r=$cod_r");
$query2= pg_fetch_result($query1, 0, 0);
$query3=pg_query($conect,"SELECT COUNT(*) FROM cubren where cod_r=$cod_r");
$query4= pg_fetch_result($query3, 0, 0);

if($query4<=0)
{
    if($query2<=0){
        $sql="DELETE FROM RUTAS  WHERE cod_r=$cod_r";
        $query=pg_query($sql);
        include_once "rutas.php";
                               echo '<script> Swal.fire({
                                icon: "success",
                                title: "REALIZADO",
                                text: "Ruta eliminada satisfactoriamente",
                              });</script>';
    }
    else
    {
        include_once "rutas.php";
        echo '<script> Swal.fire({icon: "error", title: "Error!",         
            text: "Esta ruta cubre paraderos actualmente"});
            </script>'; 
            
    }
}
else{
    include_once "rutas.php";
        echo '<script> Swal.fire({icon: "error", title: "Error!",         
            text: "Esta ruta está asignada a un bus actualmente"});
            </script>'; 
}

    
?>