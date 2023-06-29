<?php
// Configuración de la base de datos
$host = 'localhost'; // Nombre del host de la base de datos
$usuario = 'root'; // Nombre de usuario de la base de datos
$contrasena = ''; // Contraseña de la base de datos
$baseDatos = 'agrothc'; // Nombre de la base de datos

// Conexión a la base de datos
$mysqli = new mysqli($host, $usuario, $contrasena, $baseDatos);

// Verificar si hay errores de conexión
if ($mysqli->connect_error) {
    die('Error de conexión: ' . $mysqli->connect_error);
}



?>
