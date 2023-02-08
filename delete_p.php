<?php

include("conexion.php");


$cod_p=$_GET['id'];



$query1=pg_query($conect,"SELECT COUNT(*) FROM contienen where cod_p=$cod_p");
$query2= pg_fetch_result($query1, 0, 0);

if($query2<=0)
{
  $sql="DELETE FROM paraderos  WHERE cod_p=$cod_p";
  $query=pg_query($sql);
    include_once "paraderos.php";
                           echo '<script> Swal.fire({
                            icon: "success",
                            title: "REALIZADO",
                            text: "Paradero eliminado satisfactoriamente",
                          });</script>';
}


else{
  include_once "paraderos.php";
  echo '<script> Swal.fire({icon: "error", title: "Error!",         
    text: "PARADERO NO ELIMINADO, UNA RUTA CUBRE ESTE PARADERO"});
    </script>'; 
}
    
?>