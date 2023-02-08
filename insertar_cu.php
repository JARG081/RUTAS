<?php
include("conexion.php");

$fecha=$_POST['fecha'];
$placa=$_POST['placa'];
$cod_r=$_POST['cod_r'];

$query2=pg_query($conect,"SELECT COUNT(*) FROM cubren where placa=$placa and 
cod_r=$cod_r and fecha='$fecha'");
$query3 = pg_fetch_result($query2, 0, 0);

$query4=pg_query($conect,"SELECT COUNT(*) FROM buses where 
placa=$placa");
$query5= pg_fetch_result($query4, 0, 0);

$query8=pg_query($conect,"SELECT COUNT(*) FROM rutas where 
cod_r=$cod_r");
$query9= pg_fetch_result($query8, 0, 0);

if($query3>0)
{
    include_once "cubren.php";
    echo '<script> Swal.fire({ icon: "error", title: "Error!",         
    text: "REGISTRO REPETIDO",});
    </script>'; 
}
else
{
    if($query5>0)
    {
            if($query9>0)
        {
            $sql="INSERT INTO cubren (fecha,placa,cod_r) VALUES('$fecha',$placa,$cod_r)";
            $query= pg_query($conect,$sql);
            include_once "cubren.php";
                echo '<script> Swal.fire({
                    icon: "success",
                    title: "REALIZADO",
                    text: "Asignación satisfactoria",
                  });</script>';
        }
            else
            {
                include_once "cubren.php";
                echo '<script> Swal.fire({ icon: "error", title: "Error!",         
                text: "RUTA INVALIDA, REVISE EL CODIGO",});
                </script>'; 
            }
    }
    else
        {
        include_once "cubren.php";
        echo '<script> Swal.fire({ icon: "error", title: "Error!",         
        text: "BUS INVALIDO, REVISE LA PLACA",});
        </script>'; 
        }

}
?>