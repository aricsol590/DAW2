<?php
//CONEXION
    $host = "localhost";
    $user = "root";
    $password = "";
    $db = "simpledb";

    $conexion = new mysqli();
    $conexion->connect($host, $user, $password, $db);
?>