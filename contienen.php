<?php
session_start();
include_once("conexion.php");
$sqlr ="SELECT c.orden,c.cod_r,c.cod_p,p.nomb_p,r.nomb_r from contienen c 
INNER JOIN paraderos p ON c.cod_p=p.cod_p 
INNER JOIN  rutas r ON c.cod_r=r.cod_r   order by orden,r.nomb_r,p.nomb_p";
$query=pg_query($sqlr);
//incliur css
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="shortcut icon" type="image/x-icon" sizes="128x128" href="img/favicon.png">
    <title>CONTIENEN</title>
    <meta charset="UTF-8">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
      <a href="paraderos.php">Paraderos</a>
      <a href="cubren.php">Cubren</a>
      <a href="#">Contienen</a>
      <div class="dot"></div>
    </nav>


   </header>

   <main>

   <div class="contenido">

        <div  class="contenido-table">

            <div class="title">

                <h1>CONTIENEN</h1>
        
            </div>

            <div class="table">
                
            <table class="table-template">
                    <thead>
                        <tr>
                            <th>ORDEN</th>
                            <th>CODIGO RUTA</th>
                            <th>CODIGO RPARADERO</th>
                            <th>NOMBRE RUTA</th>
                            <th>NOMBRE PARADERO</th>
                            <th>ELIMINAR</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            while($row= pg_fetch_object($query)){
                        ?>
                        <tr>
                            <td><?php echo $row->orden?></td>
                            <td><?php echo $row->cod_r?></td>
                            <td><?php echo $row->cod_p?></td>
                            <td><?php echo $row->nomb_r?></td>
                            <td><?php echo $row->nomb_p?></td>
                            <td><a href="delete_co2.php?id=<?php echo $row ->cod_r?>&name=<?php echo $row->cod_p?>&ord=<?php echo $row->orden?>" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></a></td>
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

                <h3>Nuevo </h3>

            </div>
            <br>

            <div class="input-ingresodos">

                <div id="input-ingresodos">

                    <form action="insertar_co.php" method="POST">
                        <input type="number" class="form-control-mb3" name="cod_r" placeholder="codigo ruta" required>
                        <input type="number" class="form-control-mb3" name="cod_p" placeholder="codigo paradero" required>
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


