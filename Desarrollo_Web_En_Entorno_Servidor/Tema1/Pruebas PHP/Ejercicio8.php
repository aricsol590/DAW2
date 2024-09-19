<?php
$array = array("Miércoles","Viernes","Martes","Jueves","Lunes");
$array["Sab"]="Sábado";
$array["Dom"]="Domingo";
$a=0;
foreach($array as $elementos){  
    if($elementos=="Lunes"){
        unset($array[$a]);
    }
    $a++;
}
print_r($array);
?>