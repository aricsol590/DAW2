<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="5.php" method="post">
        <label>
            <input type="text" name="user"><br>
        </label>
        <label>
            <input type="password" name="pass"><br>
        </label>
        <label>
            <input type="submit" name="enviar" value="Enviar">
        </label>
    </form>
</body>
</html>

<?php
    $usu= "Alejandro";
    $pass = "12345";

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST)) {
            # code...
        }
    }
?>  