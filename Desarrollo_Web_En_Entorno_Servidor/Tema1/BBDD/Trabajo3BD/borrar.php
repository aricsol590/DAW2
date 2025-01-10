<?php
include 'conexion.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $codigo = $_POST['codigo'];

    try {
        // Iniciar transacción
        $conexion->begin_transaction();

        // Eliminar registros relacionados en la tabla stocks
        $sqlStocks = "DELETE FROM stocks WHERE producto = ?";
        $stmtStocks = $conexion->prepare($sqlStocks);
        $stmtStocks->bind_param('i', $codigo);
        $stmtStocks->execute();

        if ($stmtStocks->affected_rows === 0 && $conexion->errno) {
            throw new Exception("Error eliminando en stocks: " . $conexion->error);
        }

        $stmtStocks->close();

        // Ahora eliminar el producto
        $sqlProducto = "DELETE FROM productos WHERE id = ?";
        $stmtProducto = $conexion->prepare($sqlProducto);
        $stmtProducto->bind_param('i', $codigo);
        $stmtProducto->execute();

        if ($stmtProducto->affected_rows === 0 && $conexion->errno) {
            throw new Exception("Error eliminando en productos: " . $conexion->error);
        }

        $stmtProducto->close();

        // Confirmar la transacción
        $conexion->commit();

        echo "<div class='alert alert-success'>Producto eliminado con éxito.</div>";
    } catch (Exception $e) {
        // Revertir la transacción en caso de error
        $conexion->rollback();
        echo "<div class='alert alert-danger'>Error al eliminar: " . $e->getMessage() . "</div>";
    }
}
?>

<a href="listado.php" class="btn btn-primary">Volver al listado</a>
