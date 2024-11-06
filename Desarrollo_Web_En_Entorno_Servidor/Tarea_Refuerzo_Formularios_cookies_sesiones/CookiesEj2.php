<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        input[name='pass'], input[name='user'] {
            margin-bottom: 3px;
        }
    </style>
</head>
<body>
    <form action="CookiesEj2.php" method="POST">
        <label>
            <input type="text" name="user" value="<?php echo isset($_COOKIE['username']) ? htmlspecialchars($_COOKIE['username']) : 'Usuario'; ?>"><br>
        </label>
        <label>
            <input type="password" name="pass" value="<?php echo isset($_COOKIE['password']) ? htmlspecialchars($_COOKIE['password']) : 'Contraseña'; ?>"><br>
        </label>
        <label>
            <input type="checkbox" name="recordar"> Recordar mis datos<br>
        </label>
        <label>
            <input type="checkbox" name="olvidar"> Olvidar mis datos<br>
        </label>
        <label>
            <input type="submit" value="Enviar">
        </label>
    </form>

    <?php
    $usuario = "Alejandro";
    $contraseña = "12345";

    
        if (isset($_POST["user"]) && isset($_POST["pass"])) {
            if ($_POST["user"] == $usuario && $_POST["pass"] == $contraseña) {
                if (isset($_POST['olvidar'])) {
                    setcookie('username',"Usuario")-3600*24;
                    setcookie('password',"Contraseña")-3600*24;
                }
                if (isset($_POST["recordar"])) {
                    setcookie('username', $_POST["user"])+3600*24; 
                    setcookie('password', $_POST["pass"])+3600*24; 
                }
                echo "¡Se ha conectado!";
            } else {
                echo "El usuario o la contraseña introducidos son incorrectos.";
            }
        }
    
    ?>
</body>
</html>
