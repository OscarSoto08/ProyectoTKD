<?php
class Navitem{
private $posicion; // Valores: izquierda, derecha, centro
private $contenido;
private $getParams;
private $atributos;


public function __construct($posicion="izquierda", $contenido=[], $atributos=[], $getParams=[]){
$this->posicion = $posicion;
$this->contenido = $contenido;
$this -> getParams = $getParams;
$this -> atributos = $atributos;
}

// public function render(){
// echo implode(separator: '', array: array_map(function($item){
//     $atributos = implode('', $this->atributos);
//     return "
//     <li class='nav-item'>
//         <a class='nav-link' href='". (($this -> link == '') ? '#' : $this -> link) ."' {$atributos}>{$item}</a>
//     </li>
//     ";
// },$this->contenido));
// }


public function getNavItem(){
    return implode(separator: '', array: array_map(function($item){
        $atributos = implode('', $this->atributos);
        $getParams = "?";
        foreach($this->getParams as $k=>$v){
            $getParams .= "$k=$v&";
        }
        //Elimino el ultimo valor: &
        $getParams = substr($getParams, 0,-1);

        return "
        <li class='nav-item'>
            <a class='nav-link' href='". (($getParams != null) ? $getParams : "#")."' {$atributos}>{$item}</a>
        </li>
        ";
    },$this->contenido));
}

public function getPosicion(){ return $this -> posicion; }
public function getContenido(){ return $this -> contenido; }

public function setPosicion($posicion){ $this -> posicion = $posicion; }
public function setContenido($contenido){ $this -> contenido = $contenido; } 
}