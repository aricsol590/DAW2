<?php
    function busqueda($cadena){
        if (strpos($cadena,"web")) {
            echo "La palabra web se encuentra en la cadena";
        }else{
            throw new Exception("La palabra web no se encuentra en la cadena");
        }
    }
    try {
        busqueda("Desarrollo de aplicaciones web");
    } catch (Exception $e) {
        echo $e->getMessage();
    }
?>