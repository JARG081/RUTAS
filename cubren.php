<?php
session_start();
include_once("conexion.php");
$sqlr ="SELECT cu.fecha,cu.placa,cu.cod_r,r.nomb_r from cubren cu INNER JOIN rutas r ON cu.cod_r=r.cod_r order by fecha,nomb_r";
$query=pg_query($sqlr);

//incliur css
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="shortcut icon" type="image/x-icon" sizes="128x128" href="img/favicon.png">
    <title>COBERTURA</title>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
      <a href="paraderos.php">Paraderos</a>
      <a href="#">Cubren</a>
      <a href="contienen.php">Contienen</a>
      <div class="dot"></div>
    </nav>


   </header>

   <main>

   <div class="contenido">

        <div  class="contenido-table">

            <div class="title">

                <h1>TRAYECTO</h1>
        
            </div>

            <div class="table">
                
            <table class="table-template">
                    <thead>
                        <tr>
                            <th>FECHA</th>
                            <th>PLACA</th>
                            <th>CODIGO RUTA</th>
                            <th>NOMBRE RUTA</th>
                            <th>ELIMINAR</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            while($row= pg_fetch_object($query)){
                        ?>
                        <tr>
                            <td><?php echo $row->fecha?></td>
                            <td><?php echo $row->placa?></td>
                            <td><?php echo $row->cod_r?></td>
                            <td><?php echo $row->nomb_r?></td>
                            <td><a href="delete_cu.php?id=<?php echo $row ->fecha?>&name=<?php echo $row->placa?>&cod=<?php echo $row->cod_r?>" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></a></td>
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

                    <form action="insertar_cu.php" method="POST">
                        <input type="date"class="form-control-mb3" min="<?php echo date('Y-m-d') ?>" name="fecha" placeholder="fecha" required>
                        <input type="number" class="form-control-mb3" name="placa" placeholder="placa" required>
                        <input type="number" class="form-control-mb3" name="cod_r" placeholder="codigo ruta" required>
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
