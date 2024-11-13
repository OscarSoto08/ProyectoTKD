<?php
class Evento{
    private $id;
    private $nombre;
    private $descripcion;
    private $fecha_inicio;
    private $fecha_fin;
    private $ciudad;
    private $precio;
    private $estado;

    public function __construct($id, $nombre, $descripcion, $fecha_inicio, $fecha_fin, $ciudad, $precio, $estado){
        $this->id = $id;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->fecha_inicio = $fecha_inicio;
        $this->fecha_fin = $fecha_fin;
        $this->ciudad = $ciudad;
        $this->precio = $precio;
        $this->estado = $estado;
    }
    public function getId(){ return $this->id; }
    public function getNombre(){ return $this->nombre; }
    public function getDescripcion(){ return $this->descripcion; }
    public function getFecha_inicio(){ return $this->fecha_inicio; }
    public function getFecha_fin(){ return $this->fecha_fin; }
    public function getCiudad(){ return $this -> ciudad; }
    public function getPrecio() { return $this ->precio; }
    public function getEstado() { return $this -> estado; }


    public function setId($id){ $this->id = $id; }
    public function setNombre($nombre){ $this->nombre = $nombre; }
    public function setDescripcion($descripcion){ $this->descripcion = $descripcion; }
    public function setFecha_inicio($fecha_inicio){ $this->fecha_inicio = $fecha_inicio; }
    public function setFecha_fin($fecha_fin){ $this->fecha_fin = $fecha_fin; }
    public function setCiudad($ciudad){ $this -> ciudad = $ciudad; }
    public function setPrecio($precio){$this -> precio = $precio; }
    public function setEstado($estado) { $this->estado = $estado; }
}