<?php
class UserServicio{
    private $UserDAO;
    private $conexion;
    public function __construct(){
        $this -> conexion = new Conexion();
        $this->UserDAO = new UserDAO($this -> conexion);
    }

    public function registrar(User $User){
        $this -> conexion -> iniciarConexion();
        if($this -> UserDAO -> insertar($User)){
           $User -> setIdPersona($this -> conexion -> obtenerKey());
           return true; 
        }
        return false;
    }

    public function verificar(User $User){
        $this -> conexion -> iniciarConexion();
        $result = $this -> UserDAO -> verificar($User);
        if($result && $this -> conexion -> numFilas() == 1){
            $registro = $this -> conexion -> extraer();
            $User -> setIdPersona($registro[0]);
            $User -> setEstado( $registro[1]);
        }
        $this -> conexion -> cerrarConexion();
        return $result;
        
    }

    public function buscarPorId($idPersona){
        
    }
}
?>