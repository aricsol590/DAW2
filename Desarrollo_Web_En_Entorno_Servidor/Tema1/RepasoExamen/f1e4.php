<?php
    $ingredientes = "Pan,Carne,Queso,Tomate";
    $array=explode(",",$ingredientes);
    foreach ($array as $key) {
        echo $key." ";
    }
    echo "\n";
    print_r($array);
?>