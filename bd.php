<?php
//bd.php
$servidor = "localhost";
$baseDeDatos = "agrothc";
$usuario = "root";
$contra = "";

try{
    $conexion = new PDO("mysql:host=$servidor;dbname=$baseDeDatos",$usuario,$contra);
}

catch(Exception $ex){
    echo $ex->getMessage();
}


?>