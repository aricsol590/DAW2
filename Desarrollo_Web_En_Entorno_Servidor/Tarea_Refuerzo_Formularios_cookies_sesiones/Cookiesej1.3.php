<?php
if (isset($_COOKIE['colorF'])) {
    $color = $_COOKIE['colorF'];
}else{
    $color="white";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Colores</title>
    <style>
        body{
            background-color: <?php echo $color?>;
        }
    </style>
</head>
<body>
    <form action="Cookiesej1.3.php" method="POST">
        <label>
            <input type="radio" name="color" value="white" <?php if($color == "white") echo 'checked';?>>Blanco</input><br>
        </label>
        <label>
            <input type="radio" name="color" value="green" <?php if($color == "green") echo 'checked';?>>Verde</input><br>
        </label>
        <label>
            <input type="radio" name="color" value="blue" <?php if($color == "blue") echo 'checked';?>>Azul</input><br>
        </label>
        <label>
            <input type="radio" name="color" value="red" <?php if($color == "red") echo 'checked';?>>Rojo</input><br>
        </label>
        <label>
            <input type="submit" value="Enviar">
        </label>
        </form>
    </body>
</html>
<?php
    if(isset($_POST['color'])){
        setcookie('colorF',$_POST['color'],time()+3600 * 24);
        header("Location:Cookiesej1.3.php");   
    }
?>




