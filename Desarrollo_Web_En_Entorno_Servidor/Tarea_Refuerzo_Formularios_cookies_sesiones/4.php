<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="4.php" method="POST">
        <label>
            <input type="number" name="num1"><br>
        </label>
        <label>
            <input type="number" name="num2"><br>
        </label>
        <label>
            <input type="submit" name="Enviar">
        </label>
    </form>
</body>
</html>

<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['num1']) && isset($_POST['num2'])) {
            $num1 = $_POST['num1'];
            $num2 = $_POST['num2'];
            echo "La suma es: $num1 + $num2 = ".$num1+$num2;
            
        }else {
            echo "Introduce dos números para poder sumarlos";
        }
    }
?>