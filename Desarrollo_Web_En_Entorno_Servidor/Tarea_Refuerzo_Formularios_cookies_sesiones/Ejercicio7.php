<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subir un Archivo</title>
</head>
<body>

    <h1>Formulario para Subir un Archivo</h1>

    <form action="" method="POST" enctype="multipart/form-data">
        <label for="file">Selecciona un archivo:</label>
        <input type="file" name="file" id="file" required>
        <br><br>
        <input type="submit" value="Subir Archivo">
    </form>

    <?php
    function manejarErrorSubida($codigoError) {
        switch ($codigoError) {
            case UPLOAD_ERR_OK:
                return "La subida fue exitosa.";
            case UPLOAD_ERR_INI_SIZE:
            case UPLOAD_ERR_FORM_SIZE:
                return "El archivo es demasiado grande.";
            case UPLOAD_ERR_PARTIAL:
                return "El archivo se subió parcialmente.";
            case UPLOAD_ERR_NO_FILE:
                return "No se subió ningún archivo.";
            case UPLOAD_ERR_NO_TMP_DIR:
                return "Falta la carpeta temporal.";
            case UPLOAD_ERR_CANT_WRITE:
                return "No se pudo escribir el archivo en el disco.";
            case UPLOAD_ERR_EXTENSION:
                return "Una extensión de PHP detuvo la subida del archivo.";
            default:
                return "Error desconocido al subir el archivo.";
        }
    }

    if (isset($_FILES['file'])) {
        $fileTmpPath = $_FILES['file']['tmp_name'];
        $fileName = $_FILES['file']['name'];
        $fileSize = $_FILES['file']['size'];
        $fileType = $_FILES['file']['type'];
        $fileError = $_FILES['file']['error'];

        if ($fileError === UPLOAD_ERR_OK) {
          
            echo "<h2>Información del archivo subido:</h2>";
            echo "Nombre original del archivo: " . htmlspecialchars($fileName) . "<br>";
            echo "Tamaño del archivo: " . ($fileSize / 1024) . " KB<br>";
            echo "Tipo de archivo: " . htmlspecialchars($fileType) . "<br>";
        } else {

            echo "<h2>Error al subir el archivo:</h2>";
            echo manejarErrorSubida($fileError);
        }
    }
    ?>
</body>
</html>
