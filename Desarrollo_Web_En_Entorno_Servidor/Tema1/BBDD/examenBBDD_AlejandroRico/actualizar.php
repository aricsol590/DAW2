<?php
include 'conexion.php';

if (isset($_GET['codigo'])) {
    $codigo = $_GET['codigo'];
    
    $sql = "SELECT codigo, nombre, precio, codigo_fabricante FROM producto WHERE codigo = $codigo";
    $result = $conexion->query($sql);

    if ($result->num_rows == 0) {
        die("Producto no encontrado");
    }
    
    $producto = $result->fetch_assoc();
} else {
    die("Código de producto no encontrado");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $codigo_fabricante = $_POST['codigo_fabricante'];

    $consulta = "UPDATE producto SET nombre = '$nombre', precio = $precio, codigo_fabricante = $codigo_fabricante WHERE codigo = $codigo";

    if ($conexion->query($consulta)) {
        header("Location: listado.php");
        exit;
    } else {
        echo "Error al actualizar el producto: " . $conexion->error;
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Actualizar Producto</title>
</head>
<body>
    <div class="container mt-5">
        <h1>Actualizar Producto</h1>
        <form action="actualizar.php?codigo=<?= htmlspecialchars($producto['codigo']); ?>" method="POST">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?= htmlspecialchars($producto['nombre']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="precio" class="form-label">Precio</label>
                <input type="number" class="form-control" id="precio" name="precio" value="<?= htmlspecialchars($producto['precio']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="codigo_fabricante" class="form-label">Código del Fabricante</label>
                <input type="number" class="form-control" id="codigo_fabricante" name="codigo_fabricante" min=1 max=7 value="<?= htmlspecialchars($producto['codigo_fabricante']); ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="listado.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</body>
</html>
