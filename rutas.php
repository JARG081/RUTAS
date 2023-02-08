<?php
include_once("conexion.php");
$sql ="SELECT * from rutas order by nomb_r,hora_salida";
$query =pg_query($sql);
$valor;



?>
<!DOCTYPE html>
<html lang="en">

<head>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>RUTAS</title>
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
      <a href="#">Rutas</a>
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

                <h3>Nueva Ruta</h3>

            </div>

            <div class="input-ingreso">

                <div id="input-ingreso">

                    <form action="insertar_r.php" method="POST">
                        <input type="number" class="form-control-mb3" name="cod_r" placeholder="Codigo" required><br>
                        <input type="text" class="form-control-mb3" name="nomb_r" placeholder="Nombre" required><br>
                        <input type="time" class="form-control-mb3" name="hora_salida" placeholder="Hora Salida" required><br>
                        <button type="submit">Agregar</button>
                    </form>
                            
                </div>

            </div>

            <div class="input-search">

                <div id="input-search">

                <form method="post">
                <label for="nomb_paradero" ></label>
                <input class="input-search-a" type="text" name="nomb_paradero" placeholder="Ingresar paradero" required>
                <input class="input-search-b" type="submit" name="submit" value="">
                </form>

                    <table>
                        
                    <?php
                    if(isset($_POST['submit'])) {
                        $nomb_paradero = $_POST['nomb_paradero'];
                        $query = "SELECT RUTAS.NOMB_R
                        FROM RUTAS
                        INNER JOIN CONTIENEN ON RUTAS.COD_R = CONTIENEN.COD_R
                        INNER JOIN PARADEROS ON CONTIENEN.COD_P = PARADEROS.COD_P
                        WHERE PARADEROS.NOMB_P = '$nomb_paradero'";
                        $result = pg_query($conect,$query);
                        if (pg_num_rows($result) > 0) {
                            while($row = pg_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td class='show'> ➝ " . $row["nomb_r"] . "</td>";
                                echo "</tr>";
                            }
                            echo "</table>";
                        } else {
                            echo "No se encontraron rutas con ese paradero";
                        }
                    }
                    ?>
                    </table>

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