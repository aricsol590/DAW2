<?php
    include 'conexion.php';
    $id=$_POST['codigo'];
    $consulta = $conexion->query("DELETE FROM producto where codigo = '$id'");
    if($consulta){
        echo "Producto eliminado correctamente";
    }else{
        echo "Error al eliminar el producto";
    }
    ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <br><br><a href="listado.php" class="btn btn-primary">Volver al listado</a>