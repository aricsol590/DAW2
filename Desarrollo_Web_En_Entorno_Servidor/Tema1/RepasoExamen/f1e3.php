<?php
    $ingredientes = "Pan,Carne,Queso,Tomate";
    $array=explode(",",$ingredientes);
    $lista = list($ingr1,$ingr2,$ingr3,$ingr4)=$array;
    echo $ingr1."\n";
    echo $ingr2."\n";
    echo $ingr3."\n";
    echo $ingr4."\n";
    print_r($lista);
?>