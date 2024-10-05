<?php
function suma($num1, $num2)
{
    return "El resultado de la suma de $num1 mas $num2 es: " . $num1 + $num2;
}
function resta($num1, $num2)
{
    return "El resultado de la resta de $num1 menos $num2 es: " . $num1 - $num2;
}
function division($num1, $num2)
{
    if ($num2 == 0) {
        throw new Exception("No se puede dividir un número entre 0");
    }
    return "El resultado de la division de $num1 entre $num2 es: " . $num1 / $num2;
}
function control()
{
    $num1 = rand(0, 9);
    $num2 = rand(0, 9);
    $op = rand(0, 3);
    if ($op == 1) {
        echo suma($num1, $num2);
    } else if ($op == 2) {
        echo resta($num1, $num2);
    } else if ($op == 3) {
        echo division($num1, $num2);
    } else {
        throw new Exception("La elección no puede ser 0");
    }
}
try {
    control();
} catch (Exception $e) {
    echo $e->getMessage();
}
