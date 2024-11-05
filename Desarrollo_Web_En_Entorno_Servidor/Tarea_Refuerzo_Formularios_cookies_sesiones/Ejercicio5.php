<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Usuario</title>
</head>
<body>
    <h1>Formulario de Usuario</h1>
    <form action="Ejercicio5Form.php" method="POST">
        <label for="user">Usuario:</label>
        <input type="text" id="user" name="user" required>
        <br><br>
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required>
        <br><br>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>
