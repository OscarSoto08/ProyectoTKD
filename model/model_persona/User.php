<?php 
require_once 'Persona.php';
class User extends Persona{
    private $rol;
    private $grado;
    private $estado;

    
    public function __construct($idPersona=null, $nombre = null, $apellido = null, $correo=null, $clave = null, $imagen = null, $telefono = null, $fNac = null, $rol = null, $grado = null, $estado = null){
        parent::__construct(idPersona: $idPersona, nombre: $nombre, apellido: $apellido, correo: $correo, clave: $clave,  imagen: $imagen, telefono: $telefono, fNac: $fNac);
        $this->rol = $rol;
        $this->grado = $grado;
        $this -> estado = $estado;
    }
    public function getEstado() { return $this -> estado; }
    public function getRol(){ return $this->rol; }
    public function getGrado(){ return $this->grado; }
    public function setEstado($estado){ $this->estado = $estado; }
    public function setRol($rol){ $this->rol = $rol; }
    public function setGrado( $grado){ $this->grado = $grado; }
}
?>