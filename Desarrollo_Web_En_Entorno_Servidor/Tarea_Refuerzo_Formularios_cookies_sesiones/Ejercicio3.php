<?php
if (isset($_GET['numero1']) && isset($_GET['numero2'])) {
    $num1 = htmlspecialchars($_GET['numero1']);
    $num2 = htmlspecialchars($_GET['numero2']);
    if(is_numeric($num1) && is_numeric($num2)){
    echo "La suma de $num1 y $num2 es: ". $num1+$num2;
    }else{
        echo "Los parámetros introducidos deben ser números";
    }
} else {
    echo "Por favor, introduce dos números como parámetro";
}
?>