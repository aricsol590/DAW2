<?php
function dividir($numerador, $denominador) {
 try {
 if ($denominador == 0) {
 throw new Error("No se puede dividir por cero.");
 }
 return $numerador / $denominador;
 } catch (Error $e) {
 return 'Error: ' . $e->getMessage();
 }
 }
echo dividir(10, 0); // Salida: Error: No se puede dividir por cero.
?>