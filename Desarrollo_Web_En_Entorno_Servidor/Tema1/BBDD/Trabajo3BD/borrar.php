<?php
include 'conexion.php'; 

if (isset($_POST['codigo']) && is_numeric($_POST['codigo'])) {
    $codigo = $_POST['codigo'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        try {
            // Iniciar transacción
            $conexion->begin_transaction();

            // Eliminar registros relacionados en la tabla stocks
            $sqlStocks = "DELETE FROM stocks WHERE producto = $codigo";
            if (!$conexion->query($sqlStocks)) {
                throw new Exception("Error eliminando en stocks: " . $conexion->error);
            }

            // Eliminar el producto
            $sqlProducto = "DELETE FROM productos WHERE id = $codigo";
            if (!$conexion->query($sqlProducto)) {
                throw new Exception("Error eliminando en productos: " . $conexion->error);
            }

            // Confirmar la transacción
            $conexion->commit();

            echo "<div class='alert alert-success'>Producto eliminado con éxito.</div>";
        } catch (Exception $e) {
            // Revertir la transacción en caso de error
            $conexion->rollback();
            echo "<div class='alert alert-danger'>Error al eliminar: " . $e->getMessage() . "</div>";
        }
    }
} else {
    echo "<div class='alert alert-danger'>Código de producto no válido.</div>";
}
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
<a href="listado.php" class="btn btn-primary">Volver al listado</a>
