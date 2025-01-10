<?php
try {
    // Datos de conexión
    $servername = "localhost";
    $username = "gestor";
    $password = "secreto";
    $dbname = "proyecto";

    $dsn = "mysql:host=$servername;dbname=$dbname;charset=utf8";
    $opciones = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ];

    // Crear la conexión
    $conexion = new PDO($dsn, $username, $password, $opciones);

} catch (PDOException $e) {
    die("Error en la conexión a la base de datos: " . $e->getMessage());
}
?>
