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
$array[4]="Lunes";
print_r($array);
?>