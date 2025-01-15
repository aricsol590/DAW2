<?php
include 'conexion.php';

$sql = "SELECT codigo, nombre, precio, codigo_fabricante FROM producto";
$result = $conexion->query($sql);

if (!$result) {
    die("Error en la consulta: " . $conexion->error);
}
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
        <a href="crear.php" class="btn btn-success mb-3">Nuevo</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Código Fabricante</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($fila = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= htmlspecialchars($fila['codigo']); ?></td>
                    <td><?= htmlspecialchars($fila['nombre']); ?></td>
                    <td><?= htmlspecialchars($fila['precio']); ?></td>
                    <td><?= htmlspecialchars($fila['codigo_fabricante']); ?></td>
                    <td>
                        <a href="actualizar.php?codigo=<?= htmlspecialchars($fila['codigo']); ?>" class="btn btn-primary">Editar</a>
                        <form action="borrar.php" method="POST" style="display:inline;">
                            <input type="hidden" name="codigo" value="<?= htmlspecialchars($fila['codigo']); ?>">
                            <button type="submit" class="btn btn-danger">Borrar</button>
                        </form>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
