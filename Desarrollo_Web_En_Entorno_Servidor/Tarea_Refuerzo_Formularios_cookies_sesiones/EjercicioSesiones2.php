<?php
    session_start();
    echo "Hola, ".$_SESSION['nombre']. " ", $_SESSION['apellido'];
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
    echo "Hola, ".$_SESSION['nombre']. " ", $_SESSION['apellido'];
    ?>
    <br>
    <a href="./EjercicioSesiones3.php">Salir</a>
</body>
</html>