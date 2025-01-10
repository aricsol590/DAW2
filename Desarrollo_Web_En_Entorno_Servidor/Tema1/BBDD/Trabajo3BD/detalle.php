<?php
include 'conexion.php';

// Comprobar si el ID está en la URL, y si no, volvemos al listado
if (!isset($_GET['id'])) {
    header('Location: listado.php');
    exit;
}

$id = $_GET['id'];

try {
    // Obtener los detalles del producto
    $sql = "SELECT p.*, f.nombre AS nombre_familia 
            FROM productos p 
            LEFT JOIN familias f ON p.familia = f.cod
            WHERE p.id = ?";
    $stmt = $conexion->prepare($sql);

    if ($stmt) {
        $stmt->bind_param('i', $id); // 'i' indica que es un entero
        $stmt->execute();
        $result = $stmt->get_result();
        $producto = $result->fetch_assoc();

        // Si no se encuentra el producto, redirigir
        if (!$producto) {
            header('Location: listado.php');
            exit;
        }

        $stmt->close();
    } else {
        throw new Exception("Error al preparar la consulta: " . $conexion->error);
    }

    // Obtener el stock del producto
    $sql_stock = "SELECT unidades FROM stocks WHERE producto = ?";
    $stmt_stock = $conexion->prepare($sql_stock);

    if ($stmt_stock) {
        $stmt_stock->bind_param('i', $id);
        $stmt_stock->execute();
        $result_stock = $stmt_stock->get_result();
        $num_stock = $result_stock->fetch_assoc();
        $stock = $num_stock['unidades'] ?? 0;

        $stmt_stock->close();
    } else {
        throw new Exception("Error al preparar la consulta de stock: " . $conexion->error);
    }

} catch (Exception $e) {
    die("Error al obtener los detalles del producto: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle del Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Detalle del Producto</h1>
        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <td><?= htmlspecialchars($producto['id']) ?></td>
            </tr>
            <tr>
                <th>Nombre</th>
                <td><?= htmlspecialchars($producto['nombre']) ?></td>
            </tr>
            <tr>
                <th>Precio</th>
                <td><?= htmlspecialchars($producto['pvp']) ?></td>
            </tr>
            <tr>
                <th>Stock</th>
                <td><?= htmlspecialchars($stock) ?></td>
            </tr>
            <tr>
                <th>Familia</th>
                <td><?= htmlspecialchars($producto['nombre_familia']) ?></td>
            </tr>
        </table>
        <a href="listado.php" class="btn btn-secondary">Volver</a>
    </div>
</body>
</html>
