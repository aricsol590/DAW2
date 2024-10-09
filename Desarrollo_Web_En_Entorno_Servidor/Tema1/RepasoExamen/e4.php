<?php
  $ingredientes = "Pan,Carne,Queso,Tomate";
  $array = explode(",",$ingredientes);
  print_r($array);
  foreach ($array as $key) {
    echo $key."\n";
  }
?>