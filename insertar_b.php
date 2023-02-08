<?php
include("conexion.php");

$placa=$_POST['placa'];
$cap=$_POST['capacidad'];
$mod=$_POST['modelo'];

$query2=pg_query($conect,"SELECT COUNT(*) FROM buses where placa=$placa");
$query3 = pg_fetch_result($query2, 0, 0);

if($query3>0)
{
    include_once "buses.php";
    echo '<script> Swal.fire({ icon: "error", title: "Error!",         
    text: "PLACA REPETIDA",});
    </script>'; 
}
else
{   
    if($placa>0)
    {
        if($cap>=10)
        {
            if($mod>0)
            {
                $sql="INSERT INTO buses VALUES($placa,$cap,$mod)";
                $query= pg_query($conect,$sql);
                include_once "buses.php";
                echo '<script> Swal.fire({
                    icon: "success",
                    title: "REALIZADO",
                    text: "Bus ingresado satisfactoriamente",
                  });</script>';
            }
            else
            {
                include_once "buses.php";
                echo '<script> Swal.fire({icon: "error", title: "Error!",         
                text: "MODELO INVALIDO"});
                </script>'; 
            }
        }
        else
        {
            include_once "buses.php";
                           echo '<script> Swal.fire({icon: "error", title: "Error!",         
                           text: "CAPACIDAD MINIMA INVALIDA"});
                           </script>'; 
        }
    }
    else{
        include_once "buses.php";
        echo '<script> Swal.fire({icon: "error", title: "Error!",         
        text: "PLACA INVALIDA"});
        </script>'; 
    }
        
    
   
    
}



?>