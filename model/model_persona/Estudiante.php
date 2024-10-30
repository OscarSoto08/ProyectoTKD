<?
require_once('Persona.php');

class Estudiante extends Persona {
    private $grado;

    public function __construct($idPersona="",$nombre="", $apellido="", $correo="", $clave="", $foto="",$telefono="", $fNac = "", $estado ="", $grado = null) {
        parent::__construct($idPersona, $nombre, $apellido, $correo, $clave, $foto, $telefono, $fNac, $estado);
        $this -> grado = $grado;
    }
    public function getGrado() { return $this->grado; } 

    public function setGrado(Grado $grado) { $this -> grado = $grado; }
}
