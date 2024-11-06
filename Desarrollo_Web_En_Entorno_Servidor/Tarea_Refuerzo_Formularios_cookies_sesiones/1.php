<?php
    if (isset($_GET['nombre'])) {
        echo "Hola, ".$_GET['nombre'];
    }else{
        echo "Introduce tu nombre en la URL";
    }
?>