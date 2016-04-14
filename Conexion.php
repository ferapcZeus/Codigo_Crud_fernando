<?php
class Conexion{

    
    public function conectar(){
    $host = 'localhost';
    $db =   'codigocrud';
    $user = 'root';
    $pwd =  '';
return $conexion = new PDO("mysql:host=$host;dbname=$db" , $user, $pwd);
    
}
}