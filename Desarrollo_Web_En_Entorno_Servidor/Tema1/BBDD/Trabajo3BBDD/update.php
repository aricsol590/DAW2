<?php
include 'conexion.php';

// Verificar si el parámetro `id` está presente en la URL
if (!isset($_GET['id'])) {
    header('Location: listado.php');
    exit;
}

$id = $_GET['id'];

try {
    // Obtener los datos actuales del producto
    $sql = "SELECT * FROM productos WHERE id = :id";
    $stmt = $conexion->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    $producto = $stmt->fetch(PDO::FETCH_ASSOC);

    // Si no se encuentra el producto, redirigir
    if (!$producto) {
        header('Location: listado.php');
        exit;
    }

    // Obtener el stock del producto desde la tabla stocks
    $sql_stock = "SELECT unidades FROM stocks WHERE producto = :producto";
    $stmt_stock = $conexion->prepare($sql_stock);
    $stmt_stock->bindParam(':producto', $id, PDO::PARAM_INT);
    $stmt_stock->execute();

    $stock = $stmt_stock->fetch(PDO::FETCH_ASSOC);
    $stock_actual = $stock['unidades'] ?? 0;

    // Obtener las familias
    $sql_familias = "SELECT cod, nombre FROM familias";
    $familias = $conexion->query($sql_familias)->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    die("Error al obtener los datos del producto: " . $e->getMessage());
}

// Procesar el formulario al enviarlo
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];
    $familia = $_POST['familia'];

    try {
        // Actualizar los datos del producto
        $sql = "UPDATE productos 
                SET nombre = :nombre, pvp = :pvp, familia = :familia 
                WHERE id = :id";

        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $stmt->bindParam(':pvp', $precio, PDO::PARAM_STR);
        $stmt->bindParam(':familia', $familia, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        $stmt->execute();

        // Actualizar el stock en la tabla stocks
        $sql_update_stock = "UPDATE stocks 
                             SET unidades = :unidades 
                             WHERE producto = :producto";

        $stmt_update_stock = $conexion->prepare($sql_update_stock);
        $stmt_update_stock->bindParam(':unidades', $stock, PDO::PARAM_INT);
        $stmt_update_stock->bindParam(':producto', $id, PDO::PARAM_INT);

        $stmt_update_stock->execute();

        // Redirigir a listado.php tras la actualización
        header('Location: listado.php');
        exit;

    } catch (PDOException $e) {
        die("Error al actualizar el producto: " . $e->getMessage());
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Actualizar Producto</h1>
        <form method="POST">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?= htmlspecialchars($producto['nombre']) ?>" required>
            </div>
            <div class="mb-3">
                <label for="precio" class="form-label">Precio</label>
                <input type="number" step="0.01" class="form-control" id="precio" name="precio" value="<?= htmlspecialchars($producto['pvp']) ?>" required>
            </div>
            <div class="mb-3">
                <label for="stock" class="form-label">Stock</label>
                <input type="number" class="form-control" id="stock" name="stock" value="<?= htmlspecialchars($stock_actual) ?>" required>
            </div>
            <div class="mb-3">
                <label for="familia" class="form-label">Familia</label>
                <select class="form-select" id="familia" name="familia" required>
                    <?php foreach ($familias as $familia): ?>
                        <option value="<?= htmlspecialchars($familia['cod']) ?>"

                            <?= $producto['familia'] === $familia['cod'] ? 'selected' : '' ?>>
                            <?= htmlspecialchars($familia['nombre']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="listado.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</body>
</html>
