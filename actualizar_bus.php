<?php 

    include("conexion.php");

    $placa = $_POST['placa'];
    $capa = $_POST['capacidad'];
    $mod = $_POST['modelo'];

    if($capa>=10)
    {
        if($mod>0)
        {
            $sql_2 = "UPDATE buses SET capacidad=$capa,modelo=$mod where placa=$placa";
            $query_2=pg_query($sql_2);
            include_once "buses.php";
                               echo '<script> Swal.fire({
                                icon: "success",
                                title: "REALIZADO",
                                text: "Datos actualizados satisfactoriamente",
                              });</script>';
        }
        else
        {   include_once "buses.php";
            echo '<script> Swal.fire({
                icon: "error",
                title: "EEROR",
                text: "MODELO INVALIDO",
              });</script>';
              
        }
    }
    else
    {include_once "buses.php";
        echo '<script> Swal.fire({
            icon: "error",
            title: "ERROR",
            text: "CAPACIDAD MINIMA INVALIDA",
          });</script>';
            
    }

?>
