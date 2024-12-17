<?php
class DropdownItem{
    private $titulo;
    private $paramsGet;

    public function __construct($titulo="", $paramsGet=[]){
        $this->titulo = $titulo;
        $this->paramsGet = $paramsGet;  
    }

    public function getDropDownItem(){
        $paramsGet = "?";
        foreach($this->paramsGet as $key => $value){
            $paramsGet .= "$key=$value&";
        }

        //Elimino el ultimo &
        $paramsGet = substr($paramsGet,0,-1);
        return "<a class='dropdown-item' href=$paramsGet>$this->titulo</a>";
    }
}