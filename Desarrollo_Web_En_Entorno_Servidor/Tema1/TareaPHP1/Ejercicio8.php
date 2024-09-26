<?php
function errores($errno,$str,$file,$line){
echo $errno, " ", $str;
}
set_error_handler("errores");
$a = $b;
?>