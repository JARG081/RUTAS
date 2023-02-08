<?php
include("conexion.php");

$cod_r=$_POST['cod_r'];
$cod_p=$_POST['cod_p'];




$query2=pg_query($conect,"SELECT COUNT(*) FROM CONTIENEN where cod_r=$cod_r and cod_p=$cod_p");
$query3 = pg_fetch_result($query2, 0, 0);
$query4=pg_query($conect,"SELECT COUNT(*) FROM rutas where cod_r=$cod_r");
$query5 = pg_fetch_result($query4, 0, 0);
$query6=pg_query($conect,"SELECT COUNT(*) FROM paraderos where cod_p=$cod_p");
$query7 = pg_fetch_result($query6, 0, 0);

if($query3>0)
{
        include_once "contienen.php";
        echo '<script> Swal.fire({ icon: "error", title: "Error!",         
        text: "REGISTRO REPETIDO",});
        </script>'; 
}
else{
    if($query5>0)
    {
        if($query7>0)
        {
            $sql="INSERT INTO contienen (cod_r,cod_p) VALUES($cod_r,$cod_p)";
            $query= pg_query($conect,$sql);
            include_once "contienen.php";
                echo '<script> Swal.fire({
                    icon: "success",
                    title: "REALIZADO",
                    text: " Asignacion satisfactoria",
                  });</script>';
        }
        else
        {
            include_once "contienen.php";
        echo '<script> Swal.fire({ icon: "error", title: "Error!",         
        text: "PARADERO INVALIDO, REVISE EL CODIGO",});
        </script>'; 
        }
    }
    else
    {
        include_once "contienen.php";
        echo '<script> Swal.fire({ icon: "error", title: "Error!",         
        text: "RUTA INVALIDA, REVISE EL CODIGO",});
        </script>'; 
    }
}


?>