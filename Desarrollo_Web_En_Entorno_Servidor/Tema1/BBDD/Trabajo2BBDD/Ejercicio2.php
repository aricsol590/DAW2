<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "gestor";
$password = "secreto";
$dbname = "proyecto";

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Comprobar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Iniciar la transacción
$conn->begin_transaction();

try {
    // Paso 1: Actualizar unidades del producto en la tienda 1
    $sql_update = "UPDATE stocks SET unidades = 1 WHERE producto = (SELECT id FROM productos WHERE nombre_corto = 'PAPYRE62GB') AND tienda = 1";
    if ($conn->query($sql_update) === TRUE) {
        // Verificar que el número de filas afectadas sea correcto
        if ($conn->affected_rows == 0) {
            throw new Exception("No se actualizó ninguna fila en la tienda 1.");
        }
    } else {
        throw new Exception("Error al actualizar las unidades en la tienda 1: " . $conn->error);
    }

    // Paso 2: Insertar 2 unidades del producto en la tienda 2
    $sql_insert = "INSERT INTO stocks (producto, tienda, unidades) 
                   VALUES ((SELECT id FROM productos WHERE nombre_corto = 'PAPYRE62GB'), 2, 2)";
    if ($conn->query($sql_insert) === TRUE) {
        // Verificar que el número de filas afectadas sea correcto
        if ($conn->affected_rows == 0) {
            throw new Exception("No se insertaron filas en la tienda 2.");
        }
    } else {
        throw new Exception("Error al insertar las unidades en la tienda 2: " . $conn->error);
    }

    // Si ambas operaciones fueron exitosas, confirmar la transacción
    $conn->commit();
    echo "Transacción realizada con éxito.";

} catch (Exception $e) {
    // Si hubo un error, deshacer la transacción
    $conn->rollback();
    echo "Error en la transacción: " . $e->getMessage();
}

// Cerrar la conexión
$conn->close();
?>
