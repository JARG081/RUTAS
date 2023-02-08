<?php

include_once("conexion.php");
session_start();
$cod_r = $_POST['cod_r'];
$cod_p = $_POST['agregar_pa'];
$sql_1="INSERT INTO CONTIENEN (cod_r,cod_p) values ($cod_r,$cod_p)";
$query= pg_query($conect,$sql_1);
if($query){
    Header("Location: ag_parad.php?id={$cod_r}");
}else {
}
?>
