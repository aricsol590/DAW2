<?php
$array=[ 
    "Abril " => "Primavera",
    "Mayo "=> "Primavera",
    "Junio " => "Primavera",
    "Julio " => "Verano",
    "Agosto "=> "Verano",
    "Septiembre "=> "Verano",
    "Octubre " => "Otoño",
    "Noviembre "=> "Otoño",
    "Diciembre "=> "Otoño",
    "Enero "=> "Invierno",
    "Febrero "=> "Invierno",
    "Marzo "=> "Invierno"];
    
    foreach ($array as $key => $value) {
        if ($value == "Invierno") {
            print($key);
        }
    }
?>