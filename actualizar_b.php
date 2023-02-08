<?php

include("conexion.php");

$placa = $_GET['id'];



$query = pg_query($conect,"SELECT * FROM buses WHERE placa=$placa");

$consulta = pg_fetch_object($query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>RUTAS</title>
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

                <h1>Buses</h1>
        
            </div>

            <div class="table">

            <?php 
            
            $sqlb ="SELECT * from buses order by placa";
            $query =pg_query($sqlb);

            ?>
                
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

                <h3>Editar Bus</h3>

            </div>


            <div class="input-ingresodos">

                <div id="input-ingresodos">

                
                <form action="actualizar_bus.php" method="POST">
                    <input type="hidden" name="placa_original" value="<?php echo $consulta->placa; ?>">
                    <input type="hidden" name="placa" value="<?php echo $consulta->placa; ?>">
                    <input type="number" placeholder="capacidad" name="capacidad" value="<?php echo $consulta->capacidad; ?>">
                    <input type="number" placeholder="modelo" name="modelo"  value="<?php echo $consulta->modelo; ?>">
                    
                    <button type="submit">Actualizar </button>
                    <button id="margin-left" href="buses.php">Regresar</button>
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






