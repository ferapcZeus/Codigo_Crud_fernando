<?php

require 'Conexion.php';
require 'Crud.php';

$mensaje = null;
if (isset($_POST['create']))
{
    $nombre = htmlspecialchars ($_POST['nombre']);
    $descripcion = htmlspecialchars ($_POST['descripcion']);
    $categoria = htmlspecialchars ($_POST['categoria']);
    $precio = htmlspecialchars ($_POST['precio']);
    
    if(!is_numeric($precio))
    {
        $mensaje = "Error en el campo precio, este  debe ser numerico";
    }
    else if($nombre == '')
    {
        $mensaje = "Error, el campo nombre es requerido";
    }
    else if(strlen($nombre > 100))
    {
        $mensaje = "El campo nombre acepta un máximo de 100 caracteres";
    }
    else if($descripcion == '')
    {
        $mensaje = "Error, el campo descripción es requerido";
    }
    else if(strlen($descripcion > 500))
    {
        $mensaje = "El campo descripcion acepta un maximo de 500 caracteres";
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
        $model->insertInto = 'productos';
        $model->insertColumns = 'nombre, descripcion, categoria, precio';
        $model->insertValues = "'$nombre', '$descripcion', '$categoria', '$precio'";
        $model->Create();
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
        <h1>CRUD : Create  -Inserta productos en tu Tabla- </h1>
        <div class="mensaje">
        <strong><?php echo $mensaje ?></strong>
        </div>
        <br><br>
        <div>
        <form class="formulario" method="POST" action="<?php echo $SERVER['PHP_SELF']  ?>">
            <table>
                <tr>
                    <td>Nombre:</td>
                    <td><input type="text" name="nombre"></td>
                </tr>
                <tr>
                    <td>Descripcion:</td>
                    <td><textarea cols="22" rows="10" type="text" name="descripcion"></textarea></td>
                </tr>
                <tr>
                    <td>Categoria:</td>
                    <td><input type="text" name="categoria"></td>
                </tr>
                <tr>
                    <td>Precio:</td>
                    <td><input type="text" name="precio"></td>
                </tr>
            </table>
            <input type="hidden" name="create">
            <br>
            <input  type="submit" value="Enviar" class="botonenviar">
            
            <a href="Read.php" class="botonver">Ver productos</a>
        </form>
        <footer>Fernando Acosta Perez-Cardona IMW 2015</footer>
        </div>    
    </body>
</html>