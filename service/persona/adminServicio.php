<?php 
class AdminServicio{
    private $adminDao;
    private $conexion;
    public function __construct(){
        $this -> conexion = new Conexion();
        $this->adminDao = new AdministradorDAO($this -> conexion);
    }

    public function autenticar(Administrador $administrador){
        $this -> conexion -> iniciarConexion();
        $this -> adminDao -> autenticar($administrador);
        $this -> conexion -> cerrarConexion();
        if($this -> conexion -> numFilas() > 0){
            $fila = $this -> conexion -> extraer();
            $administrador -> setIdPersona($fila[0]);
            return true;
        }
        return false;
    }
    
    public function consultarPorId(Administrador $admin){
        $this -> conexion -> iniciarConexion();
        $this -> adminDao -> consultarPorId( $admin->getIdPersona());
        $fila = $this -> conexion -> extraer();

        $admin -> setNombre($fila[0]);
        $admin -> setApellido($fila[1]);
        $admin -> setCorreo($fila[2]);
        $this -> conexion -> cerrarConexion();
    }

    public function consultarTodos(){
        $administradores = array();
        $this -> conexion -> iniciarConexion();
        $this -> adminDao -> consultarTodos();

        while($fila = $this -> conexion -> extraer()){
            $admin = new Administrador(
                $fila[0], // $idProfesor
                $fila[1], // $nombre
                $fila[2], // $apellido
                $fila[3], // $correo
                $fila[4], // $clave
                $fila[5], // $foto
                $fila[6], // $telefono
                $fila[7], // $fNac
                $fila[8]  // $estado
            );
            array_push($administradores, $admin);
        }
        
        
        $this -> conexion -> cerrarConexion();;
        return $administradores;
    }
}
?>