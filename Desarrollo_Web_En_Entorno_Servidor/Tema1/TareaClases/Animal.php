<?php
    class Animal{
        public $nombre;
        public $especie;

        function __construct($nombre,$especie){
            $this->nombre=$nombre;
            $this->especie=$especie;
        }
        function obtenerNombre(){
            return $this->nombre;
        }
        function comportamiento(){
            $random = rand(0, 1);
            if ($random == 0) {
                echo "El comportamiento de ",$this->nombre," es bueno \n";
            }else{
                echo "El comportamiento de ",$this->nombre," es malo \n";
            }
        }
        function __toString(){
           $mensaje = "El nombre del animal es: ".$this->nombre."\nLa especie del animal es: ".$this->especie."\n";
           return $mensaje;
        }
    }
    $animal1 = new Animal("Antonio","Mono");
    echo $animal1;
    echo $animal1->comportamiento();
    $animal1->especie="Macaco";
    echo $animal1;
    
?>