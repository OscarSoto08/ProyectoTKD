<?php
class Estudiante extends Persona {
    private $grado;

    public function __construct($idPersona="",$nombre="", $apellido="", $correo="", $clave="", $grado = null, $estado = "", $fechaNac = "", $imagen = "", $telefono ="") {
        parent::__construct($idPersona, $nombre, $apellido, $correo, $clave, $imagen, $telefono, $fechaNac, $estado);
        $this -> grado = $grado;
    }
    public function getGrado() { return $this->grado; } 

    public function setGrado(Grado $grado) { $this -> grado = $grado; }
}
