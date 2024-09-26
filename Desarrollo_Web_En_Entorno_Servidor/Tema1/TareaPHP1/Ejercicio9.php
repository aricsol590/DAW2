<?php
function MayorMenor($a){
    if($a>=5){
        echo "El número es mayor o igual a 5";
    }else{
        throw new Exception('El número es menor que 5');
    }
}
try {
    MayorMenor(4);
} catch (Exception $e) {
    echo "Exepción capturada: ", $e->getMessage();
}
?>