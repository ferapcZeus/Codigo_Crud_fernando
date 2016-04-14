<?php

require 'Conexion.php';
require 'Crud.php';

if (isset($_REQUEST['id_producto']))
{
    $id_producto = htmlspecialchars ($_REQUEST['id_producto']);
    $model = new Crud();
    $model->select = '*';
    $model->from = 'productos';
    $model->condition = "id_producto=$id_producto";
    $model->Read();
    $filas = $model->rows;
    foreach ($filas as $fila)
    {
        $nombre = $fila['nombre'];
        $descripcion = $fila['descripcion'];
        $categoria = $fila['categoria'];
        $precio = $fila['precio'];
    }    
}   

//Eliminiar
$mensaje = null;
if (isset($_POST['delete']))
{
    $id_producto = htmlspecialchars($_POST['id_producto']);
    if(!is_numeric($id_producto))
    {
     header("location: Read.php");
    }
 else 
 {
     $model = new Crud();
     $model->deleteFrom = 'productos';
     $model->condition = "id_producto=$id_producto";
     $model->Delete();
     $mensaje = $model->mensaje;
 }
}
?>

<html>
    <head>
        <meta charset="UTF-8">
         <link rel="stylesheet" href="style.css">
<style>
body {
 background-color:white}
 </style>
    </head>
    <body>
        <h1>CRUD : Delete -Borra lo que no quieras de tu Tabla productos</h1>
        <div class="mensaje">
        <strong><?php echo $mensaje ?></strong>
        </div>
        <br><br>
        <?php if (isset($_GET['id_producto'])) ?>
        <br><br>
        <strong><p>¿Estas seguro que  quieres eliminar el producto con el id numero?:</p> <?php echo htmlspecialchars($_GET['id_producto']) ?></strong>        
     
        <form method="POST" action="<?php echo $SERVER['PHP_SELF'] ?>">
            <table>
                <tr>
                    <td>Nombre:</td>
                    <td><input type="text" name="nombre" disabled="disabled" value="<?php echo $nombre ?>"></td>
                </tr>
                <tr>
                    <td>Descripcion:</td>
                    <td><textarea cols="30" rows="10" type="text" name="descripcion" disabled="disabled"><?php echo $descripcion ?></textarea></td>
                </tr>
                <tr>
                    <td>Categoria:</td>
                    <td><input type="text" name="categoria" disabled="disabled" value="<?php echo $categoria ?>"></td>
                </tr>
                <tr>
                    <td>Precio:</td>
                    <td><input type="text" name="precio" disabled="disabled" value="<?php echo $precio ?>"></td>
                </tr>
            </table>
            <input type="hidden" name="delete">
            <input type="hidden" name="id_producto" value="<?php echo htmlspecialchars($_GET['id_producto']) ?>">
            <br>
            <input  type="submit" value="Eliminar" class="botonenviar">
             <a href="Read.php" class="botonver">Ver productos</a>
                <footer>Fernando Acosta Perez-Cardona IMW 2015</footer>

    </body>
</html>
