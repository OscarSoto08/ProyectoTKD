<?
require_once('Persona.php');

class Estudiante extends Persona {
    private $matricula;
    private $grado;

    public function __construct($idPersona, $nombre, $apellido, $correo, $clave, $grado) {
        parent::__construct($idPersona, $nombre, $apellido, $correo, $clave);
        $this->grado = $grado;
    }
    public function getGrado() {
        return $this->grado;
    }
}
