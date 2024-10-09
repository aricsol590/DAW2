<?php
    $ingr = "Pan,Carne,Queso,Tomate";
    $arr = explode(",",$ingr);
    $lista = list($ingr1,$ingr2,$ingr3,$ingr4)=$arr;
    print_r($lista);
    echo "$ingr1\n$ingr2\n$ingr3\n$ingr4"
?>