<?php
$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
print_r($meses);
//$meses = array_reverse($meses);
sort($meses);
print_r($meses);
$meses[3]=strtoupper($meses[3]);
print_r($meses);
?>