<?php


session_start();
include_once("conexion.php");
$sql ="SELECT * from paraderos order by nomb_p";
$query =pg_query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>RUTAS</title>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
                            <td><a href="delete_p.php?id=<?php echo $row ->cod_p?>" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></a></td>
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

            <?php 
            $cod_p = $_GET['id'];

            $query = pg_query($conect,"SELECT * FROM paraderos WHERE cod_p=$cod_p");
            
            $consulta = pg_fetch_object($query);
            
            ?>

            <div class="input-ingresodos">

                <div id="input-ingresodos">

                       <form action="actualizar_pa.php" method="POST">
                        <input type="hidden" name="cod_p_original" value="<?php echo $consulta->cod_p; ?>">
                        <input type="hidden" name="cod" value="<?php echo $consulta->cod_p; ?>">
                        <input type="text" name="nomb" required value="<?php echo $consulta->nomb_p; ?>">
                        <input type="text" name="dir" required value="<?php echo $consulta->direccion; ?>">
                        
                        <button type="submit">Actualizar Datos</button>
                        <button id="margin-left" href="paraderos.php">Regresar</button>
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



