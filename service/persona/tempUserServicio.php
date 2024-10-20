<?php
class TempUserServicio{
    private $tempUserDAO;
    public function __construct(){
        $conexion = new Conexion();
        $this->tempUserDAO = new tempUserDAO($conexion);
    }

    public function registrar(TempUser $tempUser){
        $conexion = $this -> tempUserDAO -> getConexion();
        $conexion -> iniciarConexion();
        if($this -> tempUserDAO -> insertar($tempUser)){
           $tempUser -> setIdPersona($conexion -> obtenerKey());
           return true; 
        }
        return false;
    }
}
?>