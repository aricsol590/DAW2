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
     function paraZumo(){
	if(rand(0,1) == 0){
		return "El/la ". $this->getNombre(). " es apto/a para hacer zumo\n";
	}else{
		return "El/la ". $this->getNombre()." no es apto/a para hacer zumo\n";
}
}
}
$fruta = new Fruta("Fresa","Dulce","Rojo");
$fruta2 = new Fruta("Limón","Ácido","Amarillo");
echo $fruta;
echo $fruta2->getNombre()." ". $fruta2->getSabor()."\n";
$fruta2->setColor("Verde");
echo $fruta2;
echo $fruta2->paraZumo();


class Mediterranea extends Fruta{
	public $textura;

     function __construct($nombre,$sabor,$color,$textura){
	$this->textura = $textura;
	parent::__construct($nombre,$sabor,$color);
}
     function setTextura($textura){
	$this->textura = $textura;
}
     function getTextura(){
	return $this->textura;
}
     function __toString(){
	return parent::__toString()."La textura de la fruta es: $this->textura\n";
}
}

$fruta3 = new Mediterranea("Piña","Dulce","Marrón","Suave");
echo $fruta3;
$fruta3->setTextura("Pelohuevo");
echo $fruta3;
?>