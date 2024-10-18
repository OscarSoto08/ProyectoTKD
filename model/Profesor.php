<?
require_once('Persona.php');

class Profesor extends Persona {
    public function __construct($idPersona, $nombre, $apellido, $correo, $clave) {
        parent::__construct($idPersona, $nombre, $apellido, $correo, $clave);
    }
}
