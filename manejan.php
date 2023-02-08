<?php
include_once("conexion.php");
$sqlr ="SELECT m.fecha_i,m.fecha_f,m.placa,m.cedula,c.nomb_c from manejan m 
INNER JOIN conductores c on m.cedula=c.cedula order by fecha_i,fecha_f";
$query=pg_query($sqlr);
?>


<!DOCTYPE html>
<html lang="en">

<head>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>ASIGNAR CONCUDTOR</title>
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

                <h1>ASIGNAR CONDUCTOR</h1>

                <div class="btn-asignar">

                <!-- <a class="btn-asignar-c" href="manejan.php">Asignar</a>
         -->
                </div>
                
            </div>

            <div class="table">
                
            <table class="table-template">
                    <thead>
                        <tr>
                            <th>FECHA INICIAL</th>
                            <th>FECHA FINAL</th>
                            <th>PLACA</th>
                            <th>CEDULA</th>
                            <th>NOMBRE</th>
                            <th>ACCIONES</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            while($row= pg_fetch_object($query)){
                        ?>
                        <tr>
                            <td><?php echo $row->fecha_i?></td>
                            <td><?php echo $row->fecha_f?></td>
                            <td><?php echo $row->placa?></td>
                            <td><?php echo $row->cedula?></td>
                            <td><?php echo $row->nomb_c?></td>
                            <td><a href="delete_ma.php?id=<?php echo $row ->fecha_i?>&name=<?php echo $row->fecha_f?>
                            &pla=<?php echo $row->placa?>&ced=<?php echo $row->cedula?>" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></a></td>
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

                <h3>Nuevo</h3>

            </div>


            <div class="input-ingresodos">

                <div id="input-ingresodos">

                <form action="insertar_ma.php" method="POST">
                        <input id="margin-top" type="date"class="form-control-mb3" min="<?php echo date('Y-m-d') ?>"  name="fechai" placeholder="fecha" required>
                        <input type="date"class="form-control-mb3" min="<?php echo date('Y-m-d') ?>" name="fechaf" placeholder="fecha" required>
                        <input type="text" class="form-control-mb3" name="placa" placeholder="placa" required>
                        <input type="text" class="form-control-mb3" name="cedula" placeholder="cedula" required>
                        <button type="submit">Agregar</button>
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








<div class="container mt-5">
        <div class="row">
            <div class="col-md-8">
                <h1>Agregar Nuevo Registro</h1>
                   
            </div>
            <div class="col-md-8">
                
            </div>
        </div>
    </div> 
</body>
</html>