<?php
    $usuario = "Alejandro";
    $contraseña = "12345";
    $error = false;
    $user = $_POST['user'];
    $pass = $_POST['password'];

    if ($usuario == $user && $contraseña == $pass) {
        header("Location: index.html");
    }else {
        $error = true;
    }
    if ($error == true) {
        echo "Ha habido un error";
    }
?>