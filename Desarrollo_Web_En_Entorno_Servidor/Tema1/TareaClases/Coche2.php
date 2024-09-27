<?php
    class Coche{
        private $marca;
        private $modelo;
        private $color;
        private $velocidad;
        private $encendido = false;

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

        public function arrancar(){
            return $this->encendido=True;
        }
        public function parar(){
            return $this->encendido=False;
        }
        public function __toString(){
            $estado="";
            if ($this->encendido) {
                $estado="encendido";
            }else{
                $estado="apagado";
            }
            return "El ". $this->marca. " modelo ". $this->modelo. " de color ". $this->color. " se encuentra ".$estado." y tiene una velocidad maxima de: ". $this->velocidad;
        }
    }
        $coche1 = new Coche("Hyundai", "Tucson", "Azul", "240",False);
        echo $coche1;
        $coche1->arrancar();
        echo "\n".$coche1;

//Clase berlina
        class Berlina extends Coche{
            private $plazas;
            
            function __construct($marca, $modelo, $color, $velocidad, $plazas) {
                parent::__construct($marca, $modelo, $color, $velocidad,);
                $this->plazas = $plazas;
            }
            public function getPlazas() {
                return $this->plazas;
            }
            
            public function setPlazas($plazas) {
                $this->plazas = $plazas;
            }
            public function __toString() {
                return parent::__toString() . " y tiene " . $this->plazas . " plazas.";
            }
        }
        $coche= new Berlina("Audi","Q7","Negro","380","5");
        echo "\n".$coche;
        $coche->setPlazas("2");
        $coche->arrancar();
        echo "\n".$coche;

?>