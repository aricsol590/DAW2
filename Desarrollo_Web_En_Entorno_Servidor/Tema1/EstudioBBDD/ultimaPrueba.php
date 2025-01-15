<?php
include "ultimaConn.php";
//DELETE
$consultaPre = $conexion->query("DELETE FROM pedidos WHERE usuario_id=2");
$consulta = $conexion->query("DELETE FROM usuarios WHERE id=2");
if($consulta && $consultaPre){
    echo "Pedido eliminado correctamente<br><br>";
}else{
    echo "Error al eliminar el pedido";
}
//UPDATE
$consulta2 = $conexion->query("UPDATE usuarios SET nombre = 'Juaky' where id = 2");
if($consulta2){
    echo "Nombre cambiado correctamente<br><br>";
}else{
    echo "Error al cambiar el nombre";
}
//lISTADO
$consulta3 = $conexion->query("SELECT * FROM USUARIOS where id =3");
while($fila = $consulta3->fetch_assoc()){
    echo "ID: ".$fila['id']."<br>Nombre: ".$fila['nombre']."<br>Email: ".$fila['email'];
}

    //CREAR
    $consulta4 = $conexion->query("INSERT INTO Usuarios (nombre, email) VALUES
('Skippy', 'SkippyDildo@example.com')");
    if($consulta4){
        echo "<br><br>Usuario agregado correctamente<br><br>";
    } else{
        echo "Error al agregar el usuario";
    }
?>