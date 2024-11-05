<?php
if (isset($_FILES['file'])) {
    $fileTmpPath = $_FILES['file']['tmp_name'];
    $fileName = $_FILES['file']['name'];

        echo "Nombre original del archivo: " . htmlspecialchars($fileName) . "<br>";
        echo "Nombre temporal del archivo en el servidor: " . htmlspecialchars($fileTmpPath) . "<br>";
    
} else {
    echo "No se ha subido ningún archivo.";
}
?>