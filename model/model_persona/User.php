<?php 
require_once 'Persona.php';
class User extends Persona{
    private $rol;
    private $grado;
    private $estado;
    // `idUsuario_temporal`, `nombre`, `apellido`, `correo`, `clave`, `fechaNac`, `estado`, `telefono`, `rol`, `Grado_idGrado`
    public function __construct($idPersona=null, $nombre = null, $apellido = null, $correo=null, $clave = null, $fNac = null, $estado = null, $telefono = null, $rol = null, $grado = null){
        parent::__construct(idPersona: $idPersona, nombre: $nombre, apellido: $apellido, correo: $correo, clave: $clave,  imagen: null, telefono: $telefono, fNac: $fNac);
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