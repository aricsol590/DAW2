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
            <input type="text" name="user" value="<?php echo isset($_COOKIE['nombre']) ? $_COOKIE['nombre']:"Usuario";?>"><br>
        </label>
        <label>
            <input type="password" name="pass" value="<?php if(isset($_COOKIE['contraseña'])) echo $_COOKIE['contraseña']?>"><br>
        </label>
        <label>
            <input type="submit" value="Enviar">
        </label>
    </form>
</body>
</html>
<?php
$usu = "Alejandro";
$cont = "1234";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo $_POST['user'].$_POST['pass'];
    if (isset($_POST['user']) && isset($_POST['pass'])) {
        if ($usu == $_POST['user'] && $cont == $_POST['pass']) {
            setcookie('nombre',$_POST['user'],time()+3600 * 24);
            setcookie('contraseña',$_POST['pass'],time()+3600 * 24);
            echo "Logeado con éxito";
        }else{
            echo "Los datos introducidos son incorrectos";
            setcookie('nombre',$_POST['user'],time()-3600 * 24);
            setcookie('contraseña',$_POST['pass'],time()-3600 * 24);
        }
    }
    
}

?>