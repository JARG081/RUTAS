<?php
include_once("conexion.php");
$fecha=$_GET['id'];
$cod_r=$_GET['cod'];
$placa=$_GET['name'];

$sql="DELETE FROM cubren  WHERE fecha='$fecha' and $cod_r=cod_r and $placa=placa";
$query=pg_query($sql);

    if($query){
        include_once "cubren.php";
                               echo '<script> Swal.fire({
                                icon: "success",
                                title: "REALIZADO",
                                text: "Registro eliminado satisfactoriamente",
                              });</script>';
    }
    else
    {
        include_once "cubren.php";
                   echo '<script> Swal.fire({ icon: "error", title: "Error!",         
                   text: "Imposible eliminar el Registro",});
                   </script>'; 
    }
?>

