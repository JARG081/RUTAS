<?php include("conexion.php");

$cod_ruta=$_POST['cod_r'];
$nomb_ruta=$_POST['nomb_r'];
$hora_sal=$_POST['hora_salida'];
$horai="5:00:00";
$horaf="19:00:00";
$inputTimestamp = strtotime($hora_sal);
$startTimestamp = strtotime($horai);
$endTimestamp = strtotime($horaf);
$query2=pg_query($conect,"SELECT COUNT(*) FROM RUTAS where cod_r=$cod_ruta");
$query3 = pg_fetch_result($query2, 0, 0);
// pasa a string
if($query3>0)
{
        include_once "rutas.php";
        echo '<script> Swal.fire({ icon: "error", title: "Error!",         
        text: "CODIGO REPETIDO",});
        </script>'; 
}
        else{
                if ($cod_ruta>0) 
                {
                       if ($inputTimestamp>=$startTimestamp && $inputTimestamp<=$endTimestamp) 
                       {
                               $sql="INSERT INTO rutas VALUES($cod_ruta,'$nomb_ruta','$hora_sal')";
                               $query=pg_query($conect, $sql);
                               include_once "rutas.php";
                               echo '<script> Swal.fire({
                                icon: "success",
                                title: "REALIZADO",
                                text: "Datos ingresados satisfactoriamente",
                              });</script>';
                       }
                       else 
                       {
                       include_once "rutas.php";
                       echo '<script> Swal.fire({icon: "error", title: "Error!",         
                       text: "HORA RUTA INVALIDA"});
                       </script>'; 
               
                       }
               
               }
               
               else 
               {
                   include_once "rutas.php";
                   echo '<script> Swal.fire({ icon: "error", title: "Error!",         
                   text: "CODIGO RUTA INVALIDO",});
                   </script>'; 
               
               }
        }
        
?>