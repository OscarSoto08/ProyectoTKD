<?php
class Persona{
    protected $idPersona;
    protected $nombre;
    protected $apellido;
    protected $correo;
    protected $clave;
    protected $imagen;
    protected $fNac;
    private $estado;
    private $telefono;
    // Constructor
    public function __construct($idPersona="",$nombre="", $apellido="", $correo="", $clave="", $imagen="",$telefono="", $fNac = "", $estado =""){
        $this -> idPersona = $idPersona;
        $this -> nombre = $nombre;
        $this -> apellido = $apellido;
        $this -> correo = $correo;
        $this -> clave = $clave;
        $this -> imagen = $imagen;
        $this -> fNac = $fNac;
        $this -> estado = $estado;
        $this -> telefono = $telefono;
    }
    //GETTERS
    public function getIdPersona(){return $this -> idPersona;}
    public function getNombre(){return $this -> nombre;}
    public function getApellido(){return $this -> apellido;}
    public function getCorreo(){return $this->correo;}
    public function getClave(){return $this -> clave;}
    public function getImagen(){return $this -> imagen;}
    public function getFNac() {return $this -> fNac;}
    public function getTelefono(){return $this ->telefono;}
    public function getEstado() {return $this -> estado;}

    //SETTERS
    public function setIdPersona($idPersona){$this -> idPersona = $idPersona;}
    public function setNombre($nombre){$this -> nombre = $nombre;}
    public function setApellido($apellido){$this -> apellido = $apellido;}
    public function setCorreo($correo){$this -> correo = $correo;}
    public function setClave($clave){$this -> clave = $clave;}
    public function setImagen($imagen){$this -> imagen = $imagen;}
    public function setFNac($Fnac) {$this -> fNac = $Fnac; }
    public function setTelefono($telefono){$this -> telefono = $telefono; }
    public function setEstado($estado) {$this -> estado = $estado; }
}
?>
