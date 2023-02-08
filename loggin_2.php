<?php
session_start();
$usuario=$_POST["usuario"];
$pass=$_POST["pass"];
if($usuario=="admin" && $pass=="123")
{
    $_SESSION["usuario"]=$usuario;
    $_SESSION["pass"]=$pass;
    include_once "rutas.php";
                               echo '<script> Swal.fire({
                                icon: "success",
                                title: "INGRESO",
                              });</script>';
                
}
else
{
    echo '<script> Swal.fire({icon: "error", title: "Error!",         
        text: "USUARIO O CONTRASEÑA INVALIDO"});
        </script>'; 
        include_once "index.php";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>
