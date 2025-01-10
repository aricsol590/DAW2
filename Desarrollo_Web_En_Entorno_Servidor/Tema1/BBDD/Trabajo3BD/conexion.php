<?php
// Datos de conexión
$servername = "localhost";
$username = "gestor";
$password = "secreto";
$dbname = "proyecto";

// Crear la conexión
$conexion = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error en la conexión a la base de datos: " . $conexion->connect_error);
}

// Establecer el conjunto de caracteres a UTF-8
if (!$conexion->set_charset("utf8")) {
    die("Error al establecer el conjunto de caracteres UTF-8: " . $conexion->error);
}
?>
