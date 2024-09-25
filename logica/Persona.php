<?
<<<<<<< HEAD

class Persona{
    private $nombre;
    private $apellido;
    private $correo;
    private $clave;
    private $foto;
    function getNombre(){
        return $this -> nombre;
    }
    function setNombre($nombre){
        $this -> nombre = $nombre;
    }
    function getApellido(){
        return $this -> apellido;
    }
    function setApellido($apellido){
        $this -> apellido = $apellido;
    }
    function getCorreo(){
        return $this->correo;
    }
    function setCorreo($correo){
        $this -> correo = $correo;
    }
    function getClave(){
        return $this -> clave;
    }
    function setClave($clave){
        $this -> clave = $clave;
    }
    function getFoto(){
        return $this -> foto;
    }
    function setFoto($foto){
        $this -> foto = $foto;
    }

    function __construct($nombre, $apellido, $correo, $clave, $foto){
        $this -> nombre = $nombre;
        $this -> apellido = $apellido;
        $this -> correo = $correo;
        $this -> clave = $clave;
        $this -> foto = $foto;
    }

    
}
?>
=======
class Persona {
    protected $idPersona;
    protected $nombre;
    protected $apellido;
    protected $correo;
    protected $clave;

    public function __construct($idPersona, $nombre, $apellido, $correo, $clave) {
        $this->idPersona = $idPersona;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->correo = $correo;
        $this->clave = $clave;
    }

    public function getIdPersona() {
        return $this->idPersona;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getApellido() {
        return $this->apellido;
    }

    public function getCorreo() {
        return $this->correo;
    }

    public function getClave() {
        return $this->clave;
    }
}
>>>>>>> 260d967 (Versión 2: Diseño de la página principal mejorado y resposivo)
