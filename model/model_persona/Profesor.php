<?php
class Profesor extends Persona {
    public function __construct($idPersona="",$nombre="", $apellido="", $correo="", $clave="", $foto="",$telefono="", $fNac = "", $estado ="") {
        parent::__construct($idPersona, $nombre, $apellido, $correo, $clave, $foto, $telefono, $fNac, $estado);
    }
}
?>