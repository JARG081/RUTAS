<?php
session_start();
include_once("conexion.php");
$sql ="SELECT * from paraderos order by nomb_p";
$query =pg_query($sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>PARADEROS</title>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="shortcut icon" type="image/x-icon" sizes="128x128" href="img/favicon.png">   
    <meta charset="UTF-8">
    <script src="https://kit.fontawesome.com/ccd4ed56f8.js" crossorigin="anonymous"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilos.css">

</head>

<body>

   <header>
   <nav class="profile-destroy">
        <a href="salir.php"><i class="fa-solid fa-right-from-bracket"></i></a>
   </nav>
   <nav class="navMenu">
      <a href="rutas.php">Rutas</a>
      <a href="conductores.php">Conductores</a>
      <a href="buses.php">Buses</a>
      <a href="#">Paraderos</a>
      <a href="cubren.php">Cubren</a>
      <a href="contienen.php">Contienen</a>
      <div class="dot"></div>
    </nav>


   </header>

   <main>

   <div class="contenido">

        <div  class="contenido-table">

            <div class="title">

                <h1>PARADEROS</h1>
        
            </div>

            <div class="table">
                
            <table class="table-template">
                    <head>
                        <tr>
                            <th>CODIGO</th>
                            <th>NOMBRE</th>
                            <th>DIRECCION</th>
                            <th colspan="2">ACCIONES</th>
                        </tr>
                    </head>
                    <tbody>
                        <?php
                            while($row= pg_fetch_object($query)){
                        ?>
                        <tr>
                            <td><?php echo $row->cod_p?></td>
                            <td><?php echo $row->nomb_p?></td>
                            <td><?php echo $row->direccion?></td>
                            <td><a href="actualizar_p.php?id=<?php echo $row->cod_p?>" class="btn btn-info"><i class="fa-solid fa-pen-to-square"></i></a></td>
                            <td><a href="delete_p.php?id=<?php echo $row->cod_p?>" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></a></td>
                        </tr> 
                        <?php   
                            }
                        ?>
                    </tbody>
                </table>


            </div>

        </div>

        <div id="div1" class="contenido-ingreso">

            <div class="title-agg-ruta">

                <h3>Nuevo Paradero</h3>

            </div>

            <div class="input-ingresodos">

                <div id="input-ingresodos">

                    <form action="insertar_p.php" method="POST">
                        <input type="number" class="form-control-mb3" name="cod_p" placeholder="Codigo" required>
                        <input type="text" class="form-control-mb3" name="nomb_p" placeholder="Nombre" required>
                        <input type="text" class="form-control-mb3" name="direccion" placeholder="Direccion" required>
                        <button type="submit">Agregar</button>
                    </form>
                            
                </div>

            </div>

        </div>

    
   </div>



 
                        
<div>




   </main>

   <footer></footer>
   



</div>



<script src="js/main.js"></script>
<script src="https://kit.fontawesome.com/a81368914c.js"></script>
</body>

    