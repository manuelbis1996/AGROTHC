<?php
// Configuración de la base de datos
$host = 'localhost'; // Nombre del host de la base de datos
$usuario = 'root'; // Nombre de usuario de la base de datos
$contrasena = ''; // Contraseña de la base de datos
$baseDatos = 'agrothc'; // Nombre de la base de datos

// Crear la conexión a la base de datos
$mysqli = new mysqli($host, $usuario, $contrasena, $baseDatos);

// Verificar si hay errores en la conexión
if ($mysqli->connect_errno) {
    echo 'Error al conectar a la base de datos: ' . $mysqli->connect_error;
    exit();
}
?>
