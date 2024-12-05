<?php
// Definimos las variables de conexión a la base de datos
$servidor = "localhost";
$usuario = "root";  
$password = "";        
$bd_nombre = "empresa";

// Intentamos establecer la conexión a la base de datos usando las credenciales anteriores
$conexion = new mysqli($servidor, $usuario, $password, $bd_nombre);

// Verificamos si hubo algún error en la conexión
if ($conexion->connect_error) {
    // Si hay un error, mostramos un mensaje y detenemos la ejecución del script
    echo("Conexión fallida: " . $conexion->connect_error);
    exit;
}
echo "Conexión realizada con éxito<br>";

// Paso 1: Insertar registros en la tabla Usuarios
$sql_insert = "INSERT INTO Usuarios (Nombre, Clave, Rol) VALUES (?, ?, ?)";
$usuarios = [
    ['Usuario1', 'User1', 1],
    ['Usuario2', 'User2', 1],
    ['Usuario3', 'User2', 1],
    ['Usuario4', 'User1', 1],
    ['Root1', 'root1', 0]
];
$insertados = 0;

$stmt = $conexion->prepare($sql_insert);
if ($stmt) {
    foreach ($usuarios as $usuario) {
        $stmt->bind_param("ssi", $usuario[0], $usuario[1], $usuario[2]); // Vincula los parámetros
        $stmt->execute();
        $insertados++;
    }
    $stmt->close();
    echo "$insertados registros insertados correctamente.<br>";
} else {
    echo "Error al preparar la inserción: " . $conexion->error;
}

// Paso 2: Mostrar los registros de la tabla Usuarios
echo "<br>Registros en la tabla Usuarios:<br>";
$sql_select = 'SELECT * FROM Usuarios';
$resultado = $conexion->query($sql_select);

if ($resultado) {
    while ($row = $resultado->fetch_assoc()) {
        echo "Nombre: " . $row['Nombre'] . ", Clave: " . $row['Clave'] . ", Rol: " . $row['Rol'] . "<br>";
    }
    $resultado->free();
} else {
    echo "Error al mostrar los registros: " . $conexion->error;
}

// Paso 3: Filtrar usuarios con rol = 0
echo "<br>Usuarios con rol 0:<br>";
$sql_select_rol_0 = 'SELECT * FROM Usuarios WHERE Rol = ?';
$stmt = $conexion->prepare($sql_select_rol_0);

if ($stmt) {
    $rol = 0;
    $stmt->bind_param("i", $rol);
    $stmt->execute();
    $resultado = $stmt->get_result();

    while ($row = $resultado->fetch_assoc()) {
        echo "Nombre: " . $row['Nombre'] . ", Clave: " . $row['Clave'] . "<br>";
    }
    $stmt->close();
} else {
    echo "Error al filtrar por rol: " . $conexion->error;
}

// Paso 4: Borrar usuarios cuyo nombre contiene "Usuario" (excepto User1)
echo "<br>Borrar usuarios cuyo nombre contiene 'Usuario' (excepto 'User1'):<br>";
$sql_delete = "DELETE FROM Usuarios WHERE Nombre LIKE 'Usuario%' AND Clave != 'User1'";

if ($conexion->query($sql_delete) === TRUE) {
    echo $conexion->affected_rows . " registros borrados.<br>";
} else {
    echo "Error al borrar registros: " . $conexion->error;
}

// Paso 5: Actualizar la clave de 'Root1'
echo "<br>Actualizar clave de Root1:<br>";
$sql_update = "UPDATE Usuarios SET Clave = ? WHERE Nombre = ?";
$stmt = $conexion->prepare($sql_update);

if ($stmt) {
    $clave_nueva = 'new_root1';
    $nombre = 'Root1';
    $stmt->bind_param("ss", $clave_nueva, $nombre);
    $stmt->execute();
    echo "Clave de Root1 actualizada correctamente.<br>";
    $stmt->close();
} else {
    echo "Error al actualizar datos: " . $conexion->error;
}

// Paso 6: Crear la tabla Pedidos
echo "<br>Crear la tabla Pedidos:<br>";
$sql_create_table = "CREATE TABLE IF NOT EXISTS Pedidos (
    IdPedido INT AUTO_INCREMENT PRIMARY KEY,
    Detalle VARCHAR(255),
    Fecha DATE
)";
if ($conexion->query($sql_create_table) === TRUE) {
    echo "Tabla 'Pedidos' creada correctamente.<br>";
} else {
    echo "Error al crear la tabla: " . $conexion->error;
}

// Paso 7: Insertar registros en la tabla Pedidos
echo "<br>Insertar registros en la tabla Pedidos:<br>";
$sql_insert_pedidos = "INSERT INTO Pedidos (Detalle, Fecha) VALUES (?, ?)";
$stmt = $conexion->prepare($sql_insert_pedidos);

if ($stmt) {
    $stmt->bind_param("ss", $detalle, $fecha);
    $detalle = 'Pedido1';
    $fecha = '2024-11-21';
    $stmt->execute();

    $detalle = 'Pedido2';
    $fecha = '2024-11-22';
    $stmt->execute();

    echo "Registros insertados en la tabla 'Pedidos'.<br>";
    $stmt->close();
} else {
    echo "Error al insertar registros en la tabla Pedidos: " . $conexion->error;
}

// Paso 8: Mostrar los registros de la tabla Pedidos
echo "<br>Mostrar registros de la tabla Pedidos:<br>";
$sql_select_pedidos = 'SELECT * FROM Pedidos';
$resultado = $conexion->query($sql_select_pedidos);

if ($resultado) {
    while ($row = $resultado->fetch_assoc()) {
        echo "Detalle: " . $row['Detalle'] . ", Fecha: " . $row['Fecha'] . "<br>";
    }
    $resultado->free();
} else {
    echo "Error al mostrar registros de la tabla Pedidos: " . $conexion->error;
}

// Paso 9: Eliminar la tabla Pedidos
echo "<br>Eliminar la tabla Pedidos:<br>";
$sql_drop_table = "DROP TABLE IF EXISTS Pedidos";
if ($conexion->query($sql_drop_table) === TRUE) {
    echo "Tabla 'Pedidos' eliminada.<br>";
} else {
    echo "Error al eliminar la tabla Pedidos: " . $conexion->error;
}

// Cerrar la conexión
$conexion->close();
?>
