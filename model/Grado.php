<?php
class Grado{
    private $idGrado;
    private $nombre;
    public function __construct($idGrado = null ,$nombre = null){
        $this->idGrado = $idGrado;
        $this->nombre = $nombre;
    }
    public function getIdGrado(){ return $this->idGrado; }
    public function getNombre(){ return $this->nombre; }

    public function setIdGrado($idGrado){ $this->idGrado = $idGrado; }
    public function setNombre($nombre){ $this->nombre = $nombre; }
}