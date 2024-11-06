<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            background-color: <?php echo (isset($_COOKIE['color']))? $_COOKIE['color']:'white'?>;
        }
        
    </style>
</head>
<body>
    <form action="CookiesEj1.2.php" method="POST">
    <label>
        <input type="radio" value="Blanco" name="color">Blanco</input><br>
    </label>
    <label>
        <input type="radio" value="Rojo" name="color">Rojo</input><br>
    </label>
    <label>
        <input type="radio" value="Verde" name="color">Verde</input><br>
    </label>
    <label>
        <input type="radio" value="Azul" name="color">Azul</input><br>
    </label>
    <label>
        <input type="submit" value="Enviar">
    </label>
    </form>
</body>
</html>

<?php
    if (!isset($_COOKIE['color'])) {
        setcookie('color',$_POST['color'],time() - 3600 * 24);
    }
?>