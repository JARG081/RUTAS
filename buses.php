<?php
session_start();
include_once("conexion.php");
$sqlb ="SELECT * from buses order by placa";
$query =pg_query($sqlb);
//incliur css
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>BUSES</title>
    <link rel="shortcut icon" type="image/x-icon" sizes="128x128" href="img/favicon.png">
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
      <a href="conductores.php">Conductores</a>
      <a href="#">Buses</a>
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

                <h1>BUSES</h1>

                <div class="btn-asignar">

                <a class="btn-asignar-c" href="manejan.php">Asignar</a>
        
                </div>
                
            </div>

            <div class="table">
                
            <table class="table-template">
                    <head>
                        <tr>
                            <th>PLACA</th>
                            <th>CAPACIDAD</th>
                            <th>MODELO</th>
                            <th colspan="2" >ACCIONES</th>
                        </tr>
                    </head>
                    <tbody>
                        <?php
                            while($row= pg_fetch_object($query)){
                        ?>
                        <tr>
                            <td><?php echo $row->placa?></td>
                            <td><?php echo $row->capacidad?></td>
                            <td><?php echo $row->modelo?></td>
                            <td><a href="actualizar_b.php?id=<?php echo $row->placa?>" class="btn btn-info"><i class="fa-solid fa-pen-to-square"></i></a></td>
                            <td><a href="delete_b.php?id=<?php echo $row ->placa?>" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></a></td>
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

                <h3>Nuevo Bus</h3>

            </div>


            <div class="input-ingresodos">

                <div id="input-ingresodos">

                <form action="insertar_b.php" method="POST">
                        <input type="number" class="form-control-mb3" name="placa" placeholder="Placa" required>
                        <input type="number" class="form-control-mb3" name="capacidad" placeholder="Capacidad" required>
                        <input type="number" class="form-control-mb3" name="modelo" placeholder="Modelo" required>
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

<div class="container mt-5">
        <div class="row">
            <div class="col-md-8">
                <h1>INGRESO DATOS</h1>
                
            </div>
            <div class="col-md-8">
         
            </div>
        </div>
    </div> 

<script src="js/main.js"></script>
<script src="https://kit.fontawesome.com/a81368914c.js"></script>
</body>






