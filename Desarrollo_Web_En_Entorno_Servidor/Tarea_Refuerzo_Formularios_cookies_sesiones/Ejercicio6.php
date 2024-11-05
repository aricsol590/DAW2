<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subir archivo</title>
</head>
<body>
    <h2>Subir un archivo al servidor</h2>
    <form action="Ejercicio6Form.php" method="post" enctype="multipart/form-data">
        <label for="file">Selecciona un archivo:</label>
        <input type="file" name="file" id="file" required>
        <input type="submit" value="Subir archivo">
    </form>
</body>
</html>
