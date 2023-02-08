<?php
include("conexion.php");

$cod_p=$_POST['cod_p'];
$nomb_p=$_POST['nomb_p'];
$direccion=$_POST['direccion'];

$query2=pg_query($conect,"SELECT COUNT(*) FROM paraderos where cod_p=$cod_p");
$query3 = pg_fetch_result($query2, 0, 0);
$query4=pg_query($conect,"SELECT COUNT(*) FROM paraderos where nomb_p='$nomb_p'");
$query5= pg_fetch_result($query4, 0, 0);
$query6=pg_query($conect,"SELECT COUNT(*) FROM paraderos where direccion='$direccion'");
$query7= pg_fetch_result($query6, 0, 0);

if($query7>0)
{
    include_once "paraderos.php";
    echo '<script> Swal.fire({ icon: "error", title: "Error!",         
    text: "DIRECCIÓN REPETIDA",});
    </script>'; 
}
else
{
    if($query5>0)
{
    include_once "paraderos.php";
    echo '<script> Swal.fire({ icon: "error", title: "Error!",         
    text: "PARADERO REPETIDO",});
    </script>'; 
}
else
{
        if($query3>0)
    {
    include_once "paraderos.php";
    echo '<script> Swal.fire({ icon: "error", title: "Error!",         
    text: "CODIGO REPETIDO",});
    </script>'; 
    }

    else
    {
        if($cod_p>0)
        {
        $sql="INSERT INTO paraderos VALUES($cod_p,'$nomb_p','$direccion')";
        $query= pg_query($conect,$sql);
        include_once "paraderos.php";
                echo '<script> Swal.fire({
                    icon: "success",
                    title: "REALIZADO",
                    text: "Paradero ingresado satisfactoriamente",
                  });</script>';
        }
        else
        {
           include_once "paraderos.php";
                echo '<script> Swal.fire({icon: "error", title: "Error!",         
                text: "CODIGO INVALIDO"});
                </script>'; 

        }
    

    }
}
}



