<?php
$nombreServidor = "localhost";
$usuario = "rico";
$contraseña = "dwes";
$bbdd = "tienda";

try {
    $conexion = new mysqli($nombreServidor, $usuario, $contraseña, $bbdd);

    if ($conexion->connect_error) {
        throw new Exception("Conexión a la base de datos 'tienda' fallida: " . $conexion->connect_error);
    }

} catch (Exception $e) {
    echo $e->getMessage();
}
?>
