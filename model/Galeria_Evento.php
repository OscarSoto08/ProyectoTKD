<?php 
class Galeria_Evento{
    private $Evento;
    private $idGaleria;
    private $imagen;

    public function __construct($Evento = '', $idGaleria = '', $imagen = ''){
        $this->Evento = $Evento;
        $this->idGaleria = $idGaleria;
        $this->imagen = $imagen;
    }

    public function getEvento(){ return $this -> Evento; }
    public function getIdGaleria(){ return $this -> idGaleria; }
    public function getImagen(){ return $this ->imagen; }


    public function setEvento($Evento) { $this -> Evento = $Evento; }
    public function setIdGaleria($idGaleria) { $this -> idGaleria = $idGaleria; }
    public function setImagen($imagen) { $this ->imagen = $imagen; }
}