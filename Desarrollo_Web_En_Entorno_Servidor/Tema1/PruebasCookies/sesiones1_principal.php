<?php
function comprobador($InputPass, $InputUser){
    if ($InputUser == "usuario" && $InputPass == "1234") {
        $user = array("Usuario" => "User", "Rol" => 0);
        print_r($user);
        return $user;
    } else if ($InputUser == "admin" && $InputPass == "12345") {
        $user = array("Usuario" => "Admin", "Rol" => 1);
        print_r($user);
        return $user;
    }else{
        return false;
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $datos = comprobador($_POST['pass'],$_POST['user']);
    if ($datos == false) {
        $usuario = $_POST['user'];
        $error = true;
    }else{
        session_start();
        $_SESSION['Usuario'] = $_POST['user'];
        header("Location: receptor.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    /*
    if (isset($_GET["Redirigido"])) {
        echo "<p>Haga login para continuar</p>";
    }
    ?>
    <?php
    //VOY POR AQUÍ
    if (isset($error) and $error == true) {
        echo "<p>Revise su usuario y contraseña</p>";
    }
    */
    ?>
    <form action="" method="POST">
        <input name="user" type="text" value="<?php if(isset($usuario)) echo $usuario;?>"><br>
        <input name="pass" type="password"><br>
        <input type="submit" value="Enviar">
        
    </form>
</body>

</html>