<?php 
class AdminServicio{
    private $adminDao;
    private $conexion;
    public function __construct(){
        $this -> conexion = new Conexion();
        $this->adminDao = new AdministradorDAO($this -> conexion);
    }

    public static function autenticar(Persona $administrador){
        $conexion = new Conexion();
        $adminDao = new AdministradorDAO($conexion);
        $conexion -> iniciarConexion();
        $adminDao -> autenticar($administrador);
        $conexion -> cerrarConexion();
        if($conexion -> numFilas() > 0){
            $fila = $conexion -> extraer();
            $administrador -> setIdPersona($fila[0]);
            return true;
        }
        return false;
    }
    
    public function consultarPorId($id_user){
        $this -> conexion -> iniciarConexion();
        $this -> adminDao -> consultarPorId( $id_user);
        $fila = $this -> conexion -> extraer();
        $admin = new Administrador(
            $id_user,
            $fila[0],
            $fila[1],
            $fila[2],
            $fila[3],
            $fila[4],
            $fila[5],
            $fila[6],
            $fila[7],
        );
        $this -> conexion -> cerrarConexion();
        return $admin;
    }

    public function consultarTodos(){
        $administradores = array();
        $this -> conexion -> iniciarConexion();
        $this -> adminDao -> consultarTodos();

        while($fila = $this -> conexion -> extraer()){
            $admin = new Administrador(
                $fila[0], // $idAdministrador
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

    public function insertar(Administrador $administrador){
        $this -> conexion -> iniciarConexion();
        $resultado = $this -> adminDao -> insertar($administrador);
        $this -> conexion -> cerrarConexion();
        return $resultado;
    }

    public function actualizar(Administrador $administrador){
        $this -> conexion -> iniciarConexion();
        $resultado = $this -> adminDao -> actualizar($administrador);
        $this -> conexion -> cerrarConexion();
        return $resultado;
    }
    public function eliminar($id){
        $this -> conexion -> iniciarConexion();
        $resultado = $this -> adminDao -> eliminar($id);
        $this -> conexion -> cerrarConexion();
        return $resultado;
    }
}
