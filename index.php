<?php
include_once("conexion.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<!DOCTYPE html>
<html>
<head>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="shortcut icon" type="image/x-icon" sizes="128x128" href="img/favicon.png">
	<title>LOGGIN</title>
	<link rel="stylesheet" href="css/login.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

	<img class="wave" src="img/wave.png">

	<div class="container">

		<div class="img">
			<img src="img/bg.svg">
		</div>

	    <div class="login-content">

			<form method="post" action="loggin_2.php">

				<img src="img/avatar.svg">

				<h2 class="title">Bienvenido</h2>

           		<div class="input-div one">

           		   <div class="i">

           		   		<i class="fas fa-user"></i>
           		   </div>

           		   <div class="div">

           		   	<h5>Usuario</h5>

           		   		<input type="text" name="usuario" class="input">
           		   </div>

           		</div>

           		<div class="input-div pass">

           		   <div class="i"> 

           		    	<i class="fas fa-lock"></i>

           		   </div>

           		   <div class="div">

           		    	<h5>Contraseña</h5>

           		    	<input type="password" name="pass" class="input">

            	   </div>

            	</div>

            	<a class="ocultar" href="#">S</a>

            	<input type="submit" class="btn" value="Login">
                
            </form>
        </div>
    </div>
    <script type="text/javascript" src="js/main.js"></script>
</body>
</html>
   

</html>
