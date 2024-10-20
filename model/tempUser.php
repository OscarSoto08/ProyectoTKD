<?php 
require_once 'Persona.php';
class TempUser extends Persona{
    private $rol;
    private $grado;
    public function __construct($idPersona=null, $nombre = null, $apellido = null, $correo=null, $clave = null, $foto = null, $telefono = null, $rol = null, $grado = null){
        parent::__construct($idPersona, $nombre, $apellido, $correo, $clave, $foto, $telefono);
        $this->rol = $rol;
        $this->grado = $grado;
    }
    public function getRol(){ return $this->rol; }
    public function setRol($rol){ $this->rol = $rol; }
}
?>