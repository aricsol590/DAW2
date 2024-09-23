<?php
$nombre="Alejandro*Rico*Soler";
$array=explode("*",$nombre);
$lista=list($nombre,$apell1,$apell2)=$array;

foreach ($lista as $posicion) {
    echo "$posicion ";
}
echo "\n";
foreach ($lista as $posicion) {
    echo "$posicion\n";
}
//A la lista le pasas varios parámetros directamente.
?>