<?php
include 'conexion.php';

// Cargar las familias
$sql = "SELECT cod, nombre FROM familias";
$stmt = $conexion->query($sql);
$familias = $stmt->fetchAll();

// Procesar el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $familia = $_POST['familia'];

    $sql = "INSERT INTO productos (nombre, descripcion, pvp, familia) VALUES (:nombre, :descripcion, :pvp, :familia)";
    $stmt = $conexion->prepare($sql);

    try {
        $stmt->execute([
            ':nombre' => $nombre,
            ':descripcion' => $descripcion,
            ':pvp' => $precio,
            ':familia' => $familia,
        ]);
        header('Location: listado.php');
        exit;
    } catch (PDOException $e) {
        echo "Error al crear el producto: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Crear Producto</title>
</head>
<body>
    <div class="container mt-5">
        <h1>Crear Producto</h1>
        <form method="POST">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" id="nombre" name="nombre" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea id="descripcion" name="descripcion" class="form-control" required></textarea>
            </div>
            <div class="mb-3">
                <label for="precio" class="form-label">Precio</label>
                <input type="number" step="0.01" id="precio" name="precio" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="familia" class="form-label">Familia</label>
                <select id="familia" name="familia" class="form-select" required>
                    <?php foreach ($familias as $familia): ?>
                        <option value="<?= $familia['cod']; ?>"><?= $familia['nombre']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Crear</button>
        </form>
    </div>
</body>
</html>
