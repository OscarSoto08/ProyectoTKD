<?php 
class AdminServicio{
    private $adminDao;
    public function __construct(){
        $conexion = new Conexion();
        $this->adminDao = new AdministradorDAO($conexion);
    }

    public function autenticar(Administrador $administrador){
        $conexion = $this -> adminDao -> getConexion();
        $conexion -> iniciarConexion();
        $this -> adminDao -> autenticar($administrador);
        $conexion -> cerrarConexion();
        if($conexion -> numFilas() > 0){
            $fila = $conexion -> extraer();
            $administrador -> setIdPersona($fila[0]);
            return true;
        }
        return false;
    }
    
    public function consultarPorId(Administrador $admin){
        $conexion = $this -> adminDao -> getConexion();
        $conexion -> iniciarConexion();
        $this -> adminDao -> consultarPorId( $admin->getIdPersona());
        $fila = $conexion -> extraer();

        $admin -> setNombre($fila[0]);
        $admin -> setApellido($fila[1]);
        $admin -> setCorreo($fila[2]);
        $conexion -> cerrarConexion();
    }
}
?>