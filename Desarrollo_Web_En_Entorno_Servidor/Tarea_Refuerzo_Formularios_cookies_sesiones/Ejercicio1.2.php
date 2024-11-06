<?php
    if (isset($_GET['nombre'])) {
        $nombre=$_GET['nombre'];
        echo "Hola $nombre <br>";
    }else{
        echo "Introduce tu nombre en la URL<br>";
    }
    echo "La ruta es: ".$_SERVER['PHP_SELF'];
?>