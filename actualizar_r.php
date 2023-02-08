<?php

include("conexion.php");




$sql ="SELECT * from rutas order by nomb_r,hora_salida";
$query =pg_query($sql);


?>

<!DOCTYPE html>
<html lang="es"></html>
<head>
    
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/ccd4ed56f8.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/estilos.css">
    <title>Editar Ruta?></title>
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
      <a href="contienen.php">Contienen</a>
      <div class="dot"></div>
    </nav>

   </header>

   <main>

   <div class="contenido">

        <div  class="contenido-table">

            <div class="title">

                <h1>HORARIO RUTAS</h1>
        
            </div>

            <div class="table">
                
            <table class="table-template">
                    <thead>
                        <tr>
                            <th>CODIGO</th>
                            <th>NOMBRE</th>
                            <th>HORA SALIDA</th>
                            <th colspan="3">ACCIONES</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            while($row= pg_fetch_object($query)){
                        ?>
                        <tr>
                            <td><?php echo $row->cod_r?></td>
                            <td><?php echo $row->nomb_r?></td>
                            <td><?php echo $row->hora_salida?></td>
                            <td>
                                <a  href="actualizar_r.php?id=<?php echo $row->cod_r?>" class="btn btn-info">
                                    <i class="fa-solid fa-pen-to-square"></i>
                               
                            </td>

                            <td>
                                <a href="delete_r.php?id=<?php echo $row ->cod_r?>" class="btn btn-danger">
                                    <i class="fa-solid fa-trash-can"></i>
                                </a>
                            </td>

                            <td>
                                <a href="ag_parad.php?id=<?php echo $row ->cod_r?>" class="btn btn-info">
                                    <i class="fa-solid fa-map-location-dot"></i>
                                </a>
                            </td>
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

                <h3>Editar Ruta</h3>

            </div>

            <div class="input-ingreso">

                <div id="input-ingreso">

                <?php
                $cod_ruta = $_GET['id'];
                $query = pg_query($conect,"SELECT * FROM rutas WHERE cod_r='$cod_ruta'");
                $consulta = pg_fetch_object($query);
                ?>

                <form action="actualizar_ruta.php" method="POST">
                <input type="hidden" name="cod_ruta_original" value="<?php echo $consulta->cod_r; ?>">
                <input required type="text" name="nombre" value="<?php echo $consulta->nomb_r; ?>">
                <input required type="time" name="hora"  max="17:00" min="5:00" step="1" value="<?php echo $consulta->hora_salida; ?>">
                <button type="submit">Actualizar</button>     
                <button id="margin-left" href="rutas.php">Regresar</button>     
                </form>
                
                </div>
                
            </div>

            <div class="input-search">
            <!-- BUSQUEDA PARADERO -->
                <div id="input-search">

                <form method="post">
                <label for="nomb_paradero" ></label>
                <input class="input-search-a" type="text" name="nomb_paradero" placeholder="Ingresar paradero" required>
                <input class="input-search-b" type="submit" name="submit" value="">
                </form>

       

                </div>

                <div class="clear">

                <form action="rutas.php" method="post">
                <input class="btn-submit" type="submit" name="reset" value="Borrar">
                </form>

                <?php
                if(isset($_POST['reset'])) {
                    unset($_POST['nomb_paradero']);
                    unset($result);
                }
                ?>

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
</html>