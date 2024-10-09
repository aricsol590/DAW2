<?php
    $fich = fopen("fichero_ejemplo.txt", "r");
    if ($fich === false) {
        echo "No se encuentra fichero_ejemplo.txt<br>";
    }else{
        echo "El fichero_ejemplo.txt abrió con éxito\n";
    }
    /*while (!feof($fich)) {
        $contenido = fgetc($fich);
    echo $contenido;
    }*/
    while (fscanf($fich,"%s",$linea)) {
        echo "$linea\n<br>";
    }
?>