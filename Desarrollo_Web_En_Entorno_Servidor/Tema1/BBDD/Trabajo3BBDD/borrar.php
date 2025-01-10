<?php
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $codigo = $_POST['codigo'];

    try {
        $conexion->beginTransaction();

        // Eliminar registros relacionados en la tabla stocks
        $sqlStocks = "DELETE FROM stocks WHERE producto = :id";
        $stmtStocks = $conexion->prepare($sqlStocks);
        $stmtStocks->execute([':id' => $codigo]);

        // Ahora eliminar el producto
        $sqlProducto = "DELETE FROM productos WHERE id = :id";
        $stmtProducto = $conexion->prepare($sqlProducto);
        $stmtProducto->execute([':id' => $codigo]);

        // Confirmar la transacción
        $conexion->commit();

        echo "<div class='alert alert-success'>Producto eliminado con éxito.</div>";
    } catch (PDOException $e) {
        // Revertir la transacción en caso de error
        $conexion->rollBack();
        echo "<div class='alert alert-danger'>Error al eliminar: " . $e->getMessage() . "</div>";
    }
}
?>

<a href="listado.php" class="btn btn-primary">Volver al listado</a>
