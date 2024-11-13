<?php
class Evento{
    public $id;
    public $nombre;
    public $descripcion;
    public $fecha_inicio;
    public $fecha_fin;
    public $galeria;

    public function __construct($id = null, $nombre = null, $descripcion = null, $fecha_inicio = null, $fecha_fin = null, $galeria = null){
        $this->id = $id;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->fecha_inicio = $fecha_inicio;
        $this->fecha_fin = $fecha_fin;
        $this->galeria = $galeria;
    }

    public function getId(){ return $this->id; }
    public function getNom(){ return $this->nombre; }
    public function getDescripcion(){ return $this->descripcion; }
    public function getFecha_inicio(){ return $this->fecha_inicio; }
    public function getFecha_fin(){ return $this->fecha_fin; }
    public function getGaleria(){ return $this->galeria; }


    public function setId($id){ $this->id = $id; }
    public function setNombre($nombre){ $this->nombre = $nombre; }
    public function setDescripcion($descripcion){ $this->descripcion = $descripcion; }
    public function setFecha_inicio($fecha_inicio){ $this->fecha_inicio = $fecha_inicio; }
    public function setFecha_fin($fecha_fin){ $this->fecha_fin = $fecha_fin; }
    public function setGaleria($galeria){ $this->galeria = $galeria; }
}