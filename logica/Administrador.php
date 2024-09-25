<?
require_once('Persona.php');

class Administrador extends Persona {
    private $foto;
    private $telefono;
    private $estado;
    
    public function __construct($idPersona, $nombre, $apellido, $correo, $clave, $foto, $telefono, $estado) {
        parent::__construct($idPersona, $nombre, $apellido, $correo, $clave);
        $this->foto = $foto;
        $this->telefono = $telefono;
        $this -> estado = $estado;
    }

    //GETTERS
    public function getFoto() { return $this->foto;}
    public function getEstado() { return $this->estado;}
    public function getTelefono() { return $this->telefono;}


    //SETTERS
    public function setFoto($foto) { $this -> foto = $foto;}
    public function setEstado($estado) { $this -> estado = $estado;}
    public function setTelefono($telefono) { $this -> telefono = $telefono;}
}
