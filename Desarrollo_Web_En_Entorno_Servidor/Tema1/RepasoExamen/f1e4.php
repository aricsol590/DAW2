<?php
   class Fruta{
    private $nombre;
    private $sabor;
    private $color;

    function __construct($nombre,$sabor,$color){
        $this->nombre = $nombre;
        $this->sabor = $sabor;
        $this->color = $color;
    }
    function setNombre($nombre){
        $this->nombre = $nombre;
    }
    function setSabor($sabor){
        $this->sabor = $sabor;
    }
    function setColor($color){
        $this->color = $color;
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
    function __toString(){
        return "El nombre de la fruta es: $this->nombre\nEl sabor de la fruta es: $this->sabor\nEl color de la fruta es: $this->color\n";
    }
   }
   function paraZumo(Fruta $fr){
    $random = rand(0,1);
    if ($random == 0) {
        echo "El/la ". $fr->getNombre(). " es apto/a para hacer zumo\n";
    }else{
        echo "El/la ". $fr->getNombre(). " no es apto/a para hacer zumo\n";
    }
   }
   $fruta1 = new Fruta("Fresa","Roja","Dulce");
   $fruta2 = new Fruta("Limón","Amarillo","Ácido");
   echo $fruta1;
   echo $fruta2->getNombre()."\n";
   echo $fruta2->getSabor();
   $fruta1->setSabor("Mierda");
   echo $fruta1;
   echo paraZumo($fruta1);
   class Mediterranea extends Fruta{
    public $textura;
    function __construct($nombre,$sabor,$color,$textura){
        $this->textura = $textura;
        parent::__construct($nombre,$sabor,$color);
    }
    function __toString(){
        return parent::__toString()."La textura de la fruta es: $this->textura\n";
    }
   }
   $fr = new Mediterranea("Sandía","Dulce","Verde","Suave");
   echo $fr;
   $fr->setNombre("melón");
   echo $fr;
   $fr->textura = "Cabron";
   echo $fr;
   $fr->setColor("Rosa Coño");
   echo $fr;
?>