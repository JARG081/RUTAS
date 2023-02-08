<?php
session_start();
include_once("conexion.php");

$cod_p=$_GET['id'];
$cod_r=$_GET['name'];
$orden=$_GET['ord'];

$sql="DELETE FROM contienen  WHERE cod_p=$cod_p and cod_r=$cod_r";
$query=pg_query($sql);

    if($query){
        Header("Location: ag_parad.php?id={$cod_r}");
        echo '<script> Swal.fire({
            icon: "success",
            title: "REALIZADO",
            text: "REGISTRO ELIMINADO",
          });</script>';
    }
    else
    {
        echo "EERROR";
    }
?>


