<?php
    if (isset($_GET['num1']) && isset($_GET['num2']) && is_numeric($_GET['num1']) && is_numeric($_GET['num2'])) {
        echo "El resultado de la suma es: ".$_GET['num1']. " + ".$_GET['num2']. " = ".$_GET['num1']+$_GET['num2'];
    }else{
        echo "No se han introducido los parámetros o no son números";
    }
?>