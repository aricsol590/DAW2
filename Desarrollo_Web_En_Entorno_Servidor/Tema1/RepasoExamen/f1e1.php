<?php
$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
print_r($meses);
sort($meses);
print_r($meses);
$meses[0] = strtoupper($meses[0]);
print_r($meses);
?>