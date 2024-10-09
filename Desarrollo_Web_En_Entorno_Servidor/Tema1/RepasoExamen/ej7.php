<?php
    $random = rand(0,9);
    $random2 = rand(0,9);
    function suma($num1,$num2){
        return "El resultado de la suma de $num1 y $num2 es: ".$num1+$num2;
    }
    function resta($num1,$num2){
        return "El resultado de la resta entre $num1 y $num2 es: ".$num1-$num2;
    }
    function division($num1,$num2){
        if ($num2 == 0){
            throw new Exception("No se puede dividir entre 0");
        }
        return "El resultado de la division de $num1 entre $num2 es: ". $num1/$num2;
    }
    function controlador($num1,$num2){
        $control = rand(0,3);
        if ($control == 1) {
            return suma($num1,$num2);
        }else if($control == 2){
            return resta($num1,$num2);
        }else if($control == 3){
            return division($num1,$num2);
        }else {
            throw new Exception("No existe operación 0");
        }
    }
    try {
        echo controlador($random,$random2);
    } catch (Exception $e) {
        echo $e->getMessage();
    }

?>