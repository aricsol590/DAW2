<?php
    $random = rand(0,1000);
    try {
        if ($random%2 != 0) {
            throw new Exception("El numero generado es impar.(".$random.")");
        }else {
            echo "El numero es par".$random;
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }
?>