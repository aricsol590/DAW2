<?php
require_once "1conexion.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $resultado = $conexion->query("SELECT * FROM productos");
        while($fila = $resultado->fetch_assoc()){
            echo "<p>".$fila["nombre"]."</p>";
        }
        
    ?>
</body>
</html>