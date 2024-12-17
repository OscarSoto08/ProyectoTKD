<?php
class DropdownMenu{
    private $titulo;
    private $items;
    private $posicion;

    public function __construct($posicion="izquierda", $titulo="", $items=[]){
        $this ->posicion=$posicion;
        $this->titulo = $titulo;
        $this->items = $items;
    }

    public function render(){

    }

    public function getDropdownMenu(){

        $items = implode("
        ",array_map(function($item){
            return "<li>{$item->getDropDownItem()}</li>";
        },$this->items));

        return "<li class='nav-item dropdown' id='perfil-dropdown'>
                <a class='nav-link dropdown-toggle' href='#' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
                    {$this->titulo}
                </a>

                <ul class='dropdown-menu'>
                    {$items}
                </ul>
                </li>
                ";
    }
    public function getPosicion(){ return $this->posicion;}
}
