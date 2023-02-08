<?php
session_start();
include_once("conexion.php");
$cod_r = $_GET['id'];
$sql ="SELECT * from paraderos";
$sql2 =$sql2 ="SELECT c.orden,c.cod_r,c.cod_p,p.nomb_p,r.nomb_r from contienen c 
INNER JOIN rutas r ON c.cod_r=r.cod_r INNER JOIN paraderos p ON p.cod_p=c.cod_p 
where c.cod_r=$cod_r ORDER BY c.orden";
$query_2 =pg_query($sql2);
?>


<!DOCTYPE html>
<html lang="es"></html>
<head>
    <title>EDITAR RUTA</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/ccd4ed56f8.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="shortcut icon" type="image/x-icon" sizes="128x128" href="img/favicon.png">
    
</head>
<body>

<div>

   <header>
   
   </header>

   <main>

   <div class="contenido">

   <div class="select-paradero">

        <div class="cont-select">

            <form method="POST" action="ag_parad2.php">
                <input type="hidden" name="cod_r" value="<?php echo $cod_r?>">
                <div class="form-group">
                    <select name="agregar_pa" id="agregar_pa" required>
                        <option>---Seleccione Paradero---</option>
                        <?php
                            $consul="SELECT cod_p,nomb_p,direccion from paraderos where cod_p not in (SELECT cod_p from contienen where cod_r=$cod_r)";
                            $consul2=pg_query($consul);
                            
                            while ($valo =pg_fetch_array($consul2))
                            {
                                echo '<option value="'.$valo['cod_p'].'">'.$valo['nomb_p'].'    '.$valo['direccion'].'</option>';
                            }
                        ?>
                    </select>
                </div>           
                <button type="submit">Agregar</button>
            </form>


        </div>

        <div class="cont-btn-select">

            

        </div>

            <a href="rutas.php" class="btn-salir">Regresar</a>

            
        </div>



   </div>

   <div class="table-paradero">


    <table class="table-template" >

            <thead>
                            <tr>
                                <th>ORDEN</th>
                                <th>CODIGO RUTA</th>
                                <th>CODIGO PARADERO</th>
                                <th>NOMBRE PARADERO</th>
                                <th>NOMBRE RUTA</th>
                                <th>ELIMINAR</th>
                            </tr>
            </thead>

            <tbody>

            <?php   
                $cont=0;
                while($row= pg_fetch_object($query_2)){
                $cont=$cont+1;
            ?>
                            
                            <tr>
                                <td><?php echo $cont?></td>
                                <td><?php echo $row->cod_r?></td>
                                <td><?php echo $row->cod_p?></td>
                                <td><?php echo $row->nomb_p?></td>
                                <td><?php echo $row->nomb_r?></td>
                                <td><a href="delete_co.php?id=<?php echo $row ->cod_p?>&name=<?php echo $row->cod_r?>" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></a></td>
                            </tr> 

            <?php   
            }
            ?>

            </tbody>
            
            
        </table>
       
   </div>

        
   
    

   </main>

   <footer></footer>
   



</div>

<script src="js/main.js"></script>
<script src="https://kit.fontawesome.com/a81368914c.js"></script>

   


</body>
</html>