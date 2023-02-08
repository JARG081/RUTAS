<?php
include("conexion.php");

$cedula=$_POST['cedula'];
$nomb_c=$_POST['nomb_c'];
$ape_c=$_POST['ape_c'];
$fecha_nacimiento=$_POST['fecha_nacimiento'];

$query2=pg_query($conect,"SELECT COUNT(*) FROM conductores where cedula=$cedula");
$query3 = pg_fetch_result($query2, 0, 0);


if($query3>0){
    include_once "conductores.php";
    echo '<script> Swal.fire({ icon: "error", title: "Error!",         
    text: "CEDULA REPETIDA",});
    </script>'; 
}
else 
{
    if($cedula>0)
    {
        if($fecha_nacimiento>=18)
        {
            $sql="INSERT INTO conductores (cedula, nomb_c, ape_c, fecha_nacimiento)
            VALUES ('$cedula', '$nomb_c', '$ape_c', '$fecha_nacimiento')";
            $query= pg_query($conect,$sql);
            include_once "conductores.php";
                                   echo '<script> Swal.fire({
                                    icon: "success",
                                    title: "REALIZADO",
                                    text: "Datos ingresados satisfactoriamente",
                                  });</script>';
        }
        else{
            include_once "conductores.php";
            echo '<script> Swal.fire({icon: "error", title: "Error!",         
            text: "EDAD MENOR A LA REQUERIDA"});
            </script>'; 
        }
        
    }
    else{
        include_once "conductores.php";
        echo '<script> Swal.fire({icon: "error", title: "Error!",         
        text: "CEDULA INVALIDA"});
        </script>'; 
    }
    
}
?>