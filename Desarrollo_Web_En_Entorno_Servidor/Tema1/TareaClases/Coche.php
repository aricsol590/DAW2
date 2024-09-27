<?php
    class Coche{
        private $marca;
        private $modelo;
        private $color;
        private $velocidad;

        function __construct($marca, $modelo, $color, $velocidad){
            $this->marca = $marca;
            $this->modelo = $modelo;
            $this->color = $color;
            $this->velocidad = $velocidad;
        }

        public function getMarca(){
            return $this->marca;
        }

        public function getModelo(){
            return $this->modelo;
        }

        public function getColor(){
            return $this->color;
        }

        public function getVelocidad(){
            return $this->velocidad;
        }

        public function setMarca($marca){
            return $this->marca = $marca;
        }

        public function setModelo($modelo){
            return $this->modelo = $modelo;
        }

        public function setColor($color){
            return $this->color = $color;
        }

        public function setVelocidad($velocidad){
            return $this->velocidad = $velocidad;
        }

        public function __toString(){
            return "El ". $this->marca. " modelo ". $this->modelo. " de color ". $this->color. " tiene una velocidad maxima de: ". $this->velocidad."\n";
        }
    }

        $coche1 = new Coche("Hyundai", "Tucson", "Azul", "240");
        echo $coche1;
        $coche1->setVelocidad("500");
        echo $coche1;

?>