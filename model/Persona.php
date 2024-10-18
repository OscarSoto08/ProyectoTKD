<?php
class Persona{
    protected $idPersona;
    protected $nombre;
    protected $apellido;
    protected $correo;
    protected $clave;
    protected $foto;
    private $telefono;

//GETTERS
    public function getIdPersona(){return $this -> idPersona;}
    public function getNombre(){return $this -> nombre;}
    public function getApellido(){return $this -> apellido;}
    public function getCorreo(){return $this->correo;}
    public function getClave(){return $this -> clave;}
    public function getFoto(){return $this -> foto;}
    public function getTelefono(){return $this ->telefono;}

    //SETTERS
    public function setIdPersona($idPersona){$this -> idPersona = $idPersona;}
    public function setNombre($nombre){$this -> nombre = $nombre;}
    public function setApellido($apellido){$this -> apellido = $apellido;}
    public function setCorreo($correo){$this -> correo = $correo;}
    public function setClave($clave){$this -> clave = $clave;}
    public function setFoto($foto){$this -> foto = $foto;}
    public function setTelefono($telefono){$this -> telefono = $telefono; }
//CONSTRUCTOR
    public function __construct($idPersona="",$nombre="", $apellido="", $correo="", $clave="", $foto="",$telefono=""){
        $this -> idPersona = $idPersona;
        $this -> nombre = $nombre;
        $this -> apellido = $apellido;
        $this -> correo = $correo;
        $this -> clave = $clave;
        $this -> foto = $foto;
        $this -> telefono = $telefono;
    }
}
?>
