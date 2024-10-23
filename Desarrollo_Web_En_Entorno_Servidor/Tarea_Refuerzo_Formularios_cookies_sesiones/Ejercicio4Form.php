<?php
    $num1 = $_POST['num1'];
    $num2 = $_POST['num2'];

    if (is_numeric($num1) && is_numeric($num2)) {
        $suma = $num1 + $num2;
        echo "La suma de $num1 y $num2 es:".$num1+$num2;
    } else {
        echo "Los parámetros introducidos deben ser números.";
    }
?>