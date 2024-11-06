<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="CookiesEj2.2.php" method="POST">
        <label>
            <input type="text" name="user" value="<?php if(isset($_COOKIE['user'])){ echo $_COOKIE['user'];}else{echo "Usuario";}?>"><br>
        </label>
        <label>
            <input type="password" name="pass" value="<?php if(isset($_COOKIE['pass'])){ echo $_COOKIE['pass'];}else{echo "Contraseña";}?>"><br>
        </label>
        <label>
            <input type="submit" name="recordar" value="Enviar"><br>
        </label>
        <label>
            <input type="checkbox">Recordarme</input>
        </label>
    </form>
</body>
</html>

<?php
$usuario = "Alejandro";
$contraseña = "1234";
    
    if (isset($_POST['user']) && isset($_POST['pass'])) {
        if ($_POST['user'] == $usuario && $_POST['pass'] == $contraseña) {
            echo "Se ha logeado con éxito";
            if (isset($_POST['recordar'])) {
                # code...
                setcookie('user',$_POST['user'],time()+3600 * 24);
                setcookie('pass',$_POST['pass'],time()+3600 * 24);
            }
        }else{
            echo "El usuario o la contraseña son incorrectos";
        }
    }
?>