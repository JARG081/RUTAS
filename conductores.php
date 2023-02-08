<?php
session_start();
include_once("conexion.php");
$sqlb ="SELECT * from conductores order by nomb_c,ape_c";
$query =pg_query($sqlb);
//incliur css
?>


<!DOCTYPE html>
<html lang="en">

<head>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="shortcut icon" type="image/x-icon" sizes="128x128" href="img/favicon.png">
    <title>CONDUCTORES</title>
    <meta charset="UTF-8">
    <script src="https://kit.fontawesome.com/ccd4ed56f8.js" crossorigin="anonymous"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilos.css">

</head>

<body>

   <header>


   <nav class="navMenu">
      <a href="rutas.php">Rutas</a>
      <a href="#">Conductores</a>
      <a href="buses.php">Buses</a>
      <a href="paraderos.php">Paraderos</a>
      <a href="cubren.php">Cubren</a>
      <a href="contienen.php">Contienen</a>
      <div class="dot"></div>
    </nav>


   </header>

   <main>

   <div class="contenido">

        <div  class="contenido-table">

            <div class="title">

                <h1>CONDUCTORES</h1>
        
            </div>

            <div class="table">
                
            <table class="table-template">
                    <head>
                        <tr>
                            <th>CEDULA</th>
                            <th>NOMBRE</th>
                            <th>APELLIDO</th>
                            <th>EDAD</th>
                            <th colspan="2">ACCIONES</th>
                        </tr>
                    </head>
                    <tbody>
                        <?php
                            while($row= pg_fetch_object($query)){
                        ?>
                        <tr>
                            <td><?php echo $row->cedula?></td>
                            <td><?php echo $row->nomb_c?></td>
                            <td><?php echo $row->ape_c?></td>
                            <td><?php echo $row->edad?></td>
                            <td><a href="actualizar_c.php?id=<?php echo $row->cedula?>" class="btn btn-info"><i class="fa-solid fa-pen-to-square"></i></a></td>
                            <td><a href="delete_c.php?id=<?php echo $row ->cedula?>" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></a></td>
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

                <h3>Nuevo Conductor</h3>

            </div>
            <br>

            <div class="input-ingresodos">

                <div id="input-ingresodos">

                    <form action="insertar_c.php" method="POST">
                        <input type="number" class="form-control-mb3" name="cedula" placeholder="Cedula" required>
                        <input type="text" class="form-control-mb3" name="nomb_c" placeholder="Nombre" required>
                        <input type="text" class="form-control-mb3" name="ape_c" placeholder="Apellido" required>
                        <input type="number" class="form-control-mb3" name="edad" placeholder="Edad" required>
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

    
