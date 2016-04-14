<?php

require 'Conexion.php';
require 'Crud.php';

$model = new Crud();
$model->select = '*';
$model->from = 'productos';
$model->Read();
$filas = $model->rows;
$total= count($filas);
//$mensaje = null;    
?>
<html>
    <head>
        <meta charset="UTF-8">
            <link rel="stylesheet" href="style.css">

    </head>
    <body>
        <h1>CRUD : Read de la Tabla productos</h1>
        <div class="mensaje">
        <strong>El total de filas es: <?php echo $total ?></strong>
        </div>
        <br><br>
        <div>
            <table class="tabla">
                <tr>
                    <th>Id_producto</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Categoria</th>
                    <th>Precio</th>
                    
                </tr>
                <?php
                foreach ($filas as $fila)
                {
                    echo "<tr>" ;
                        echo "<td>".$fila['id_producto']." &nbsp &nbsp</td>"; 
                        echo "<td>".$fila['nombre']." &nbsp  &nbsp  &nbsp</td>"; 
                        echo "<td>".$fila['descripcion']." &nbsp &nbsp </td>";
                        echo "<td>".$fila['categoria']." &nbsp &nbsp &nbsp  &nbsp</td>";
                        echo "<td>".$fila['precio']." &nbsp &nbsp</td>";
                        echo "<td><a href='update.php?id_producto=".$fila['id_producto']."'><p>Actualizar</p></a></td>";
                        echo "<td><a href='delete.php?id_producto=".$fila['id_producto']."'><p>Eliminar</p></a></td>";
                    echo "</tr>";
                }
                ?>
               
            </table>
            
             <tr>
                    <div>
                        <br> <br>
                          <a href="create.php" class="botonver">Insertar productos</a>
                       
                    </div>
                </th>
            </tr>
            
        </div>    
                <footer>Fernando Acosta Perez-Cardona IMW 2015</footer>

    </body>
</html>
