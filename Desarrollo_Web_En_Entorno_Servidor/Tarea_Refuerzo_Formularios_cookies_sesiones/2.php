<?php
    
    if (isset($_GET['name'])) {
        echo "Hola, ". $_GET['name'];
    }else{
        echo "Introduce los parámetros requeridos";
    }

?>