<?php
include 'conexion.php';

// Comprobar si el id esta en la url, y si no, volvemos al listado
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
            WHERE p.id = :id";
    $stmt = $conexion->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    $producto = $stmt->fetch(PDO::FETCH_ASSOC);

    // Si no se encuentra el producto, redirigir
    if (!$producto) {
        header('Location: listado.php');
        exit;
    }

    $sql_stock = "SELECT unidades FROM stocks WHERE producto = :producto";
    $stmt_stock = $conexion->prepare($sql_stock);
    $stmt_stock->bindParam(':producto', $id, PDO::PARAM_INT);
    $stmt_stock->execute();

    $num_stock = $stmt_stock->fetch(PDO::FETCH_ASSOC);
    $stock = $num_stock['unidades'] ?? 0;

} catch (PDOException $e) {
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
