<?php
    require "2conexion.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        th{
            background-color: #2a9df4;
            color: white;
            padding: 15px 20px;
            text-align: left;
            border: none;
            cursor: pointer;
        }
        td{
            padding: 15px 20px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            background-color:#d0efff;
        }
    </style>
</head>
<body>
    <?php
        $resultado = $conexion->query("SELECT * FROM productos");
        echo "<table>" ;
        echo "<tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Nombre Corto</th>
        <th>Descripcion</th>
        <th>PVP</th>
        <th>familia</th>
        </tr>";
        while($fila = $resultado->fetch_assoc()){
            echo "<tr>";
            echo "<td>".$fila["id"]."</td><td>".$fila["nombre"]."</td><td>".$fila["nombre_corto"]."</td><td>".$fila["descripcion"]."</td><td>".$fila["pvp"]."</td><td>".$fila["familia"]."</td>";
            echo "</tr>";
        }
        echo "</table>";
        
        
    ?>
</body>
</html>