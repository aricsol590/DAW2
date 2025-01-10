<?php
include 'conexion.php';

// Verificar el id esta en ña url
if (!isset($_GET['id'])) {
    header('Location: listado.php');
    exit;
}

$id = $_GET['id'];

// Obtener los datos actuales del producto
$sql = "SELECT * FROM productos WHERE id = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$producto = $result->fetch_assoc();

// Si no se encuentra el producto, redirigir
if (!$producto) {
    header('Location: listado.php');
    exit;
}

// Obtener el stock del producto desde la tabla stocks
$sql_stock = "SELECT unidades FROM stocks WHERE producto = ?";
$stmt_stock = $conexion->prepare($sql_stock);
$stmt_stock->bind_param("i", $id);
$stmt_stock->execute();
$result_stock = $stmt_stock->get_result();
$stock_data = $result_stock->fetch_assoc();
$stock_actual = $stock_data['unidades'] ?? 0;

// Obtener las familias
$sql_familias = "SELECT cod, nombre FROM familias";
$result_familias = $conexion->query($sql_familias);
$familias = $result_familias->fetch_all(MYSQLI_ASSOC);

// Procesar el formulario al enviarlo
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];
    $familia = $_POST['familia'];

    try {
        // Actualizar los datos del producto
        $sql = "UPDATE productos SET nombre = ?, pvp = ?, familia = ? WHERE id = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("sdii", $nombre, $precio, $familia, $id);
        $stmt->execute();

        // Actualizar el stock en la tabla stocks
        $sql_update_stock = "UPDATE stocks SET unidades = ? WHERE producto = ?";
        $stmt_update_stock = $conexion->prepare($sql_update_stock);
        $stmt_update_stock->bind_param("ii", $stock, $id);
        $stmt_update_stock->execute();

        // Redirigir a listado.php tras la actualización
        header('Location: listado.php');
        exit;

    } catch (Exception $e) {
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
                            <?= $producto['familia'] == $familia['cod'] ? 'selected' : '' ?>>
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
