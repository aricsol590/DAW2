<?php
    $array=array(
        "Abril" => "Primavera",
        "Mayo"=> "Primavera",
        "Junio"=> "Primavera",
        "Julio" => "Verano",
        "Agosto"=> "Verano",
        "Septiembre"=> "Verano",
        "Octubre"=> "Otoño",
        "Noviembre"=> "Otoño",
        "Diciembre"=> "Otoño",
        "Enero"=> "Invierno",
        "Febrero"=> "Invierno",
        "Marzo"=> "Invierno",
    );
    print_r($array);
    foreach ($array as $key => $value) {
        if($value == "Primavera"){
            print($key."\n");
        }
        print($value);
    }
?>