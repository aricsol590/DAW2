<?php
//TABLA
    include 'ultimaConn.php';

    $consulta = $conexion->query("SELECT * FROM usuarios");
    echo "<table><tr><th>ID</th><th>Nombre</th><th>Email</th></tr>";
    while($fila = $consulta->fetch_assoc()){

        echo "<tr><td>".$fila["id"]."</td><td>".$fila["nombre"]."</td><td>".$fila["email"]."</tr>";
    }
    echo "</table>";
?>