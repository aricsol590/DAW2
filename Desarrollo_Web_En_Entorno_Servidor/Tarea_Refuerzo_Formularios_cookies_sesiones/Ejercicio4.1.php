<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="Ejercicio4.4.php" method="POST">
        <label>
            <input type="number" name="num1"></input><br>
        </label>
        <label>
            <input type="number" name="num2"></input><br>
        </label>
        <label>
            <input type="submit" value="Enviar">
        </label>
            
    </form>
</body>
</html>

<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['num1']) && isset($_POST['num2']) && is_numeric($_POST['num1']) && is_numeric($_POST['num1']) ) {
        echo $_POST['num1']. " + ". $_POST['num2'] ." = ".$_POST['num1']+$_POST['num2'];
    }else {
        echo "Complete los campos";
    }
    }
?>