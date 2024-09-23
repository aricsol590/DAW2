<?php
function calc($a=1,$b,$c){
    if($a==1){
        return $b+$c;
    }
    if($a==2){
        return $b-$c;
    }
    if($a==3){
        return $b*$c;
    }
}
echo calc(2,1,1);
?>