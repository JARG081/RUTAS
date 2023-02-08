<?php
include("conexion.php");

$fechai=$_POST['fechai'];
$fechaf=$_POST['fechaf'];
$pla=$_POST['placa'];
$ced=$_POST['cedula'];
$query1=pg_query($conect,"SELECT COUNT(*) FROM conductores where cedula=$ced");
$query2= pg_fetch_result($query1, 0, 0);
$query3=pg_query($conect,"SELECT COUNT(*) FROM buses where placa=$pla");
$query4 = pg_fetch_result($query3, 0, 0);
$query5=pg_query($conect, "SELECT COUNT(*) FROM manejan where 
placa=$pla and cedula=$ced and fecha_i='$fechai' and fecha_f='$fechaf'");
$query6 = pg_fetch_result($query5, 0, 0);



if($query6>0)
{
    include_once "manejan.php";
    echo '<script> Swal.fire({icon: "error", title: "Error!",         
    text: "REGISTRO REPETIDO"});
    </script>';
}
else{
    if($query2>0)
    {
        if($query4>0)
        {
            if($fechaf>$fechai)
            {
                $sql="INSERT INTO manejan (fecha_i,fecha_f,placa,cedula) 
                VALUES('$fechai','$fechaf',$pla,$ced)";
                $query= pg_query($conect,$sql);
                include_once "manejan.php";
                echo '<script> Swal.fire({
                    icon: "success",
                    title: "REALIZADO",
                    text: " Asignacion satisfactoria",
                  });</script>';
            }
            else
            {
                include_once "manejan.php";
                echo '<script> Swal.fire({icon: "error", title: "Error!",         
                text: "LA FECHA INICIAL DEBE SER MENOR A LA FECHA FINAL"});
                </script>'; 
            }
        }
        else
        {
            include_once "manejan.php";
            echo '<script> Swal.fire({icon: "error", title: "Error!",         
            text: "BUS INVALIDO, REVISE LA PLACA"});
            </script>'; 
        }
        
        
    }
    else 
        {
            include_once "manejan.php";
            echo '<script> Swal.fire({icon: "error", title: "Error!",         
            text: "CONDUCTOR INVALIDO, REVISE LA CEDULA"});
            </script>'; 
        }
}

?>