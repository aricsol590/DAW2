<?php
    $cadena_conexion = 'mysql:fbname=empresa;host=127.0.0.1';
    $usuario = 'root';
    $clave = ' ';
    try {
        $bd = new PDO($cadena_conexion, $usuario, $clave);
        //$bd->close();
    } catch (PDOException $e) {
        echo 'Error con la base de datos: '.$e->getMessage();
    }
?>
<?php
    $cadena_conexion = 'mysql:fbname=empresa;host=127.0.0.1';
    $usuario = 'root';
    $clave = ' ';
    try {
        $bd = new PDO($cadena_conexion, $usuario, $clave);
        echo "Conexión realizada con éxito";
        $sql = 'SELECT * FROM USUARIOS';
        $usuarios = $bd->query($sql);
        echo $usuarios->rowCount()."<br>";
        foreach ($usuarios as $row) {
            print $row['Nombre']."\t";
            print $row['Clave']."\t";
        }
    } catch (PDOException $e) {
        echo 'Error con la base de datos: '.$e->getMessage();
    }
?>