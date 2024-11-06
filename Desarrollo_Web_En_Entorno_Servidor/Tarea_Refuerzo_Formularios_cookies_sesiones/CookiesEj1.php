<?php
// Comprobar si existe una cookie con el color
$colorFondo = 'white'; // Color por defecto
if (isset($_COOKIE['color_fondo'])) {
    $colorFondo = $_COOKIE['color_fondo'];
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selecciona el Color de Fondo</title>
    <style>
        body {
            background-color: <?php echo $colorFondo; ?>;
        }
    </style>
</head>
<body>

<h1>Selecciona un color de fondo</h1>

<form action="CookiesEj1.php" method="POST">
    <label>
        <input type="radio" name="color" value="white" <?php if ($colorFondo == 'white') echo 'checked'; ?>>
        Blanco
    </label><br>
    <label>
        <input type="radio" name="color" value="red" <?php if ($colorFondo == 'red') echo 'checked'; ?>>
        Rojo
    </label><br>
    <label>
        <input type="radio" name="color" value="green" <?php if ($colorFondo == 'green') echo 'checked'; ?>>
        Verde
    </label><br>
    <label>
        <input type="radio" name="color" value="blue" <?php if ($colorFondo == 'blue') echo 'checked'; ?>>
        Azul
    </label><br>
    <input type="submit" value="Guardar Color">
</form>

<?php
if (isset($_POST['color'])) {
    $colorSeleccionado = $_POST['color'];

    // Establecer la cookie para 30 días
    setcookie('color_fondo', $_POST['color'],time() + 3600 *24);

    // Redirigir de vuelta a la página para recargar y que se establezca el color elegido
    header('Location: CookiesEj1.php');
    exit();
}
?>

</body>
</html>
