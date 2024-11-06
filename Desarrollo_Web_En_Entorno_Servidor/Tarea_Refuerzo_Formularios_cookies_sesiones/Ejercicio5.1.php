<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="Ejercicio5.5.php" method="POST">
        <label>
            <input type="text" name="user" value="Usuario"><br>
        </label>
        <label>
            <input type="password" name="pass"><br>
        </label>
        <label>
            <input type="submit" value="Enviar">
        </label>
        </form>
    </body>
    </html>
    
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usu = "Alejandro";
    $cont = "1234";
    $user = $_POST['user'];
    $pass =$_POST['pass'];
    if (isset($user) && isset($pass)) {
        if ($pass == $cont && $usu == $user) {
            header("Location: index.html");
        }else{
            $error = true;
            echo "El usuario o la contraseña son incorrectos";
        }
    }if ($error) {
        echo "Ha ocurrido un error en el login";
    }
}
?>