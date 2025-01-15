<?php
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $codFabricante = $_POST['codigo_fabricante'];    

    $consulta = $conexion->query("INSERT INTO producto (nombre, precio, codigo_fabricante) VALUES ('$nombre', '$precio', '$codFabricante')");
    if ($consulta) {
        header('Location: listado.php');
    } else {
        echo "Error al crear el producto: ". $conexion->error;
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Crear Producto</h1>
        <form action="" method="POST">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <div class="mb-3">
                <label for="precio" class="form-label">Precio</label>
                <input type="number" class="form-control" id="precio" name="precio" required>
            </div>
            <div class="mb-3">
                <label for="codigo_fabricante" class="form-label">Código del Fabricante</label>
                <input type="number" class="form-control" id="codigo_fabricante" name="codigo_fabricante" min="1" max="7" required>
            </div>
            <button type="submit" class="btn btn-primary">Crear</button>
            <a href="listado.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</body>
</html>
