<?php
    $hamburguesa = "Pan,Carne,Queso,Tomate";
    $array = explode(",",$hamburguesa);
    $lista = list($ingr1,$ingr2,$ingr3,$ingr4)=$array;
    print($ingr1."\n");
    print($ingr2."\n");
    print($ingr3."\n");
    print($ingr4."\n\n");
    print_r($lista);
?>