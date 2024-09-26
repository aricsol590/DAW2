<?php
function calcular($funcion, $valor1, $valor2) {
    return $funcion($valor1, $valor2);
}
function suma($a, $b) {
    return $a + $b;
}
$resultado = calcular('suma', 5, 7);
echo "El resultado de la suma es: " . $resultado;
?>