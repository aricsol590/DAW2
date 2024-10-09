<?php
    class Fruta{
        private $nombre;
        private $sabor;
        private $color;

        function __construct($nombre,$sabor,$color){
            $this->nombre=$nombre;
            $this->sabor=$sabor;
            $this->color=$color;
        }
        function getNombre(){
            return $this->nombre;
        }
        function getSabor(){
            return $this->sabor;
        }
        function getColor(){
            return $this->color;
        }
        function setNombre($nombre){
            return $this->nombre = $nombre;
        }
        function setSabor($sabor){
            return $this->sabor = $sabor;
        }
        function setColor($color){
            return $this->color = $color;
        }
        function __toString(){
            return "El nombre de la fruta es: $this->nombre\nEl sabor de la fruta es: $this->sabor\nEl color de la fruta es $this->color\n";
        }
    }
    function paraZumo(Fruta $fr){
        $random = rand(0,1);
        if ($random == 0) {
            echo "\nLa ".$fr->getNombre(). " es apta para hacer zumo\n\n";
        }else{
            echo "\nLa ".$fr->getNombre(). " no es apta para hacer zumo\n\n";
        }
    }
    $fruta1 = new Fruta("Naranja", "Ácido","Naranja");
    $fruta2 = new Fruta("Fresa", "Dulce", "Roja");
    echo $fruta1."\n$fruta2";
    paraZumo($fruta1);
    paraZumo($fruta2);

    class Mediterranea extends Fruta{
        public $textura;
        
       function __construct($nombre,$sabor,$color,$textura){
            parent::__construct($nombre,$sabor,$color);
                $this->textura = $textura;
        }
        function getTextura(){
            return $this->textura;
        }
        function setTextura($textura){
            $this->textura = $textura;
        }
        function __toString(){
            return parent::__toString()."La textura de la fruta es: $this->textura\n";
        }
        
    }
    $fruta3 = new Mediterranea("Piña","Dulce","Marrón","Rugosa");
    echo $fruta3."\n";
    $fruta3->setTextura("Suave");
    $fruta3->setColor("Verde");
    echo $fruta3
    
?>