<?php
include 'conexion.php';

// Consulta para obtener los productos
$sql = "SELECT id, nombre FROM productos";
$stmt = $conexion->query($sql);
$productos = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Listado de Productos</title>
</head>
<body>
    <div class="container mt-5">
        <h1>Listado de Productos</h1>
        <a href="crear.php" class="btn btn-success mb-3">Crear Nuevo Producto</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($productos as $producto): ?>
                <tr>
                    <td><?= $producto['id']; ?></td>
                    <td><?= $producto['nombre']; ?></td>
                    <td>
                        <a href="detalle.php?id=<?= $producto['id']; ?>" class="btn btn-info">Detalles</a>
                        <a href="update.php?id=<?= $producto['id']; ?>" class="btn btn-primary">Editar</a>
                        <form action="borrar.php" method="POST" style="display:inline;">
                            <input type="hidden" name="codigo" value="<?= $producto['id']; ?>">
                            <button type="submit" class="btn btn-danger">Borrar</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
