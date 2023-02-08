<?php 

    include("conexion.php");

    $original = $_POST['cod_p_original'];;
    $nomb = $_POST['nomb'];
    $dir = $_POST['dir'];
    $query2=pg_query($conect,"SELECT COUNT(*) FROM paraderos where nomb_p='$nomb' and cod_p <>$original");
    $query3 = pg_fetch_result($query2, 0, 0);
    $query4=pg_query($conect,"SELECT COUNT(*) FROM paraderos where direccion='$dir' and cod_p <>$original");
    $query5 = pg_fetch_result($query4, 0, 0);

    if($query3>0)
    {
        include_once "paraderos.php";
                echo '<script> Swal.fire({icon: "error", title: "Error!",         
                text: "NOMBRE REPETIDO"});
                </script>'; 
    }
    else
    {
        if($query5>0)
        {
            include_once "paraderos.php";
                echo '<script> Swal.fire({icon: "error", title: "Error!",         
                text: "DIRECCION REPETIDA"});
                </script>'; 
        }
        else
        {
            $sql_1 = "UPDATE paraderos SET nomb_p='$nomb',direccion='$dir' where cod_p=$original";
            $query_1=pg_query($sql_1);
            include_once "paraderos.php";
                echo '<script> Swal.fire({
                    icon: "success",
                    title: "REALIZADO",
                    text: "Paradero actualizado satisfactoriamente",
                  });</script>';
        }
    }
?>
