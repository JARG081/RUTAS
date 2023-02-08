<?php

include_once("conexion.php");

$cod_p=$_GET['name'];
$cod_r=$_GET['id'];
$orden=$_GET['ord'];

$sql="DELETE FROM contienen  WHERE cod_p=$cod_p and $cod_r=cod_r";
$query=pg_query($sql);

    if($query){
        include_once "contienen.php";
                echo '<script> Swal.fire({
                    icon: "success",
                    title: "REALIZADO",
                    text: " Registro Eliminado",
                  });</script>';
    }
    else
    {
        include_once "contienen.php";
                echo '<script> Swal.fire({icon: "error", title: "Error!",         
                text: "ERROR EN EL PROCESO"});
                </script>'; 
    }
?>