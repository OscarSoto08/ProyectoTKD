<?php 
require_once 'Persona.php';
class TempUser extends Persona{
    private $rol;
    private $grado;
    public function __construct($idPersona=null, $nombre = null, $apellido = null, $correo=null, $clave = null, $foto = null, $telefono = null, $fNac = null, $rol = null, $grado = null){
        parent::__construct(idPersona: $idPersona, nombre: $nombre, apellido: $apellido, correo: $correo, clave: $clave, foto: $foto, telefono: $telefono, fNac: $fNac);
        $this->rol = $rol;
        $this->grado = $grado;
    }
    public function getRol(){ return $this->rol; }
    public function setRol($rol){ $this->rol = $rol; }
}
?>