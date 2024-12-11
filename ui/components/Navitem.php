<?php
class Navitem{
private $posicion; // Valores: izquierda, derecha, centro
private $contenido;
private $link;
private $atributos;


public function __construct($posicion="izquierda", $contenido=[], $link = "", $atributos=[]){
$this->posicion = $posicion;
$this->contenido = $contenido;
$this -> link = $link;
$this -> atributos = $atributos;
}

public function render(){
echo implode(separator: '', array: array_map(function($item){
    $atributos = implode('', $this->atributos);
    return "
    <li class='nav-item'>
    <a class='nav-link' href='". (($this -> link == '') ? '#' : "?pid=" . base64_encode($this -> link)) ."' {$atributos}>{$item}</a>
    </li>
    ";
},$this->contenido));
}


public function getNavItem(){
return implode(separator: '', array: array_map(function($item){
    $atributos = implode('', $this->atributos);
    return "
    <li class='nav-item'>
    <a class='nav-link' href='". (($this -> link == '') ? '#' : "?pid=" . base64_encode($this -> link)) ."' {$atributos}>{$item}</a>
    </li>
    ";
},$this->contenido));
}

public function getPosicion(){ return $this -> posicion; }
public function getContenido(){ return $this -> contenido; }

public function setPosicion($posicion){ $this -> posicion = $posicion; }
public function setContenido($contenido){ $this -> contenido = $contenido; } 
}