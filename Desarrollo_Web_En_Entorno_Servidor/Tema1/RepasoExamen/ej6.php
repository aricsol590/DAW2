<?php
    $random = rand(0,1000);
    try {
        if ($random%2 != 0) {
            throw new Exception("El número $random es impar");
        }else{
            echo "El número $random es par";
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }
?>