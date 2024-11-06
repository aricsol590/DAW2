<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="EjercicioSesiones.php" method="POST">
        <label>
            <input type="text" name="nombre"><br>
        </label>
        <label>
            <input type="text" name="apellido"><br>
        </label>
        <label>
            <input type="submit" name="Enviar"><br>
        </label>
    </form>
</body>
</html>
<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['nombre']) && isset($_POST['apellido']) && !empty($_POST['nombre']) && !empty($_POST['apellido'])) {
        session_start();
    $_SESSION['nombre']=$_POST['nombre'];
    $_SESSION['apellido']=$_POST['apellido'];
    header("Location: EjercicioSesiones2.php");
    }else{
        echo "No has introducido los parámetros solicitados";
    }

}

?>