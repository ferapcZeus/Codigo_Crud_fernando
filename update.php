<?php
require 'Conexion.php';
require 'Crud.php';

//Leer
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

//Actualizar
$mensaje = null;
if (isset($_POST['update']))
{
    //$id_producto = htmlspecialchars ($_POST['id_producto']);
    $nombre = htmlspecialchars ($_POST['nombre']);
    $descripcion = htmlspecialchars ($_POST['descripcion']);
    $categoria = htmlspecialchars ($_POST['categoria']);
    $precio = htmlspecialchars ($_POST['precio']);
    if(!is_numeric($precio))
    {
        $mensaje = "Error el campo precio debe ser numerico";
    }
    else if($nombre == '')
    {
        $mensaje = "Error, el campo nombre es requerido";
    }
    else if(strlen($nombre > 100))
    {
        $mensaje = "El campo nombre acepta un maximo de 100 caracteres";
    }
    else if($descripcion == '')
    {
        $mensaje = "Error, el campo descripcion es requerido";
    }
    else if(strlen($descripcion > 500))
    {
        $mensaje = "El campo descripcion acepta un máximo de 500 caracteres";
    }
    else if($categoria == '')
    {
        $mensaje = "Error, el campo categoria es requerido";
    }
    else if(strlen($categoria > 100))
    {
        $mensaje = "El campo categoria acepta un maximo de 100 caracteres";
    }
    else
    {
    $model = new Crud();
    $model->update = 'productos';
    $model->set = "nombre='$nombre', descripcion='$descripcion', categoria='$categoria', precio='$precio'";
    $model->condition = "id_producto=$id_producto";
    $model->Update();
    $mensaje = $model->mensaje;
    }
}   
?>

<html>
    <head>
        <meta charset="UTF-8">
                    <link rel="stylesheet" href="style.css">

    </head>
    <body>
        <h1>CRUD : Update. Tabla productos</h1>
        <div class="mensaje">
        <strong><?php echo $mensaje ?></strong>
        </div>
        <br><br>
        <div class="formulario">
        <form method="POST" action="<?php echo $SERVER['PHP_SELF'] ?>">
            <table>
                <tr>
                    <td>Nombre:</td>
                    <td><input type="text" name="nombre" value="<?php echo $nombre ?>"></td>
                </tr>
                <tr>
                    <td>Descripcion:</td>
                    <td><textarea cols="30" rows="10" type="text" name="descripcion"><?php echo $descripcion ?></textarea></td>
                </tr>
                <tr>
                    <td>Categoria:</td>
                    <td><input type="text" name="categoria" value="<?php echo $categoria ?>"></td>
                </tr>
                <tr>
                    <td>Precio:</td>
                    <td><input type="text" name="precio" value="<?php echo $precio ?>"></td>
                </tr>
            </table>
            <input type="hidden" name="update">
            <input type="hidden" name="id_producto" value="<?php echo $id_producto ?>">
            <br>
            <input class="botonenviar" type="submit" value="Actualizar">
            <a href="Read.php" class="botonver">Ver productos</a>
        </form>
        </div>    
                <footer>Fernando Acosta Perez-Cardona IMW 2015</footer>

    </body>
</html>