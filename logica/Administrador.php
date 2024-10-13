<?php
require_once('Persona.php');
require '../Persistencia/AdministradorDAO.php';
class Administrador extends Persona {
    private $estado;
    
    public function __construct($idPersona=0, $nombre="", $apellido="", $correo="", $clave="", $foto="", $telefono="", $estado=null) {
        parent::__construct($idPersona, $nombre, $apellido, $correo, $clave);
        $this->foto = $foto;
        $this -> estado = $estado;
    }

    //GETTERS
    public function getFoto() { return $this->foto;}
    public function getEstado() { return $this->estado;}


    //SETTERS
    public function setFoto($foto) { $this -> foto = $foto;}
    public function setEstado($estado) { $this -> estado = $estado;}

    //Métodos del login
    public function autenticar(){
        $conn = new Conexion();
        $conn -> iniciarConexion();
        $adminDao = new AdministradorDAO(null,null,null,$this->correo,$this->clave,null,null,null,$conn);
        $adminDao -> autenticar();
        $conn -> cerrarConexion();
        if($conn -> numFilas() > 0){
            $registro = $conn -> extraer();
            $this -> idPersona = $registro[0];
            return true;
        }else{
            return false;
        }
    }
}
 