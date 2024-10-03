<?php
    $meses = array("Enero ","Febrero ","Marzo ","Abril ","Mayo ","Junio ","Julio ","Agosto ","Septiembre ","Octubre ","Noviembre ","Diciembre ");
/*
    $meses[0][0] = "Primavera";
    $meses[1][0] = "Verano";
    $meses[2][0] = "Otoño";
    $meses[3][0] = "Invierno";
    $meses[3][1] = "Enero";
    $meses[3][2] = "Febrero";
    $meses[3][3] = "Marzo";
    $meses[0][1] = "Abril";
    $meses[0][2] = "Mayo";
    $meses[0][3] = "Junio";
    $meses[1][1] = "Julio";
    $meses[1][2] = "Agosto";
    $meses[1][3] = "Septiembre";
    $meses[2][1] = "Octubre";
    $meses[2][2] = "Noviembre";
    $meses[2][3] = "Diciembre";
print_r($meses);
*/
//Los meses son las claves y las estaciones los valores
$primavera = $meses[3].$meses[4].$meses[5];
$verano = $meses[6].$meses[7].$meses[8];
$otoño = $meses[9].$meses[10].$meses[11];
$invierno = $meses[0].$meses[1].$meses[2];
echo $primavera;
?>