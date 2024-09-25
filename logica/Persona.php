<?

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
