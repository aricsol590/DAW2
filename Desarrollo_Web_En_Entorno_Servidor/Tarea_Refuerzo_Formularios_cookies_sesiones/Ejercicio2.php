<?php
if (isset($_GET['nombre'])) {
    $nombre = htmlspecialchars($_GET['nombre']);

    echo "¡Hola, $nombre!";
} else {
    echo "Por favor, introduce tu nombre como parámetro";
}
?>