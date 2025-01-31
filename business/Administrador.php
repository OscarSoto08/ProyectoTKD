<?php
/**
 * Summary of Administrador
 */
class Administrador extends Persona{
    public function __construct($idPersona='', $nombre='', $apellido='', $correo='', $clave='', $estado='', $fecha_nacimiento='', $telefono='', $tipo_usuario = '', $imagen=null){
        parent::__construct($idPersona, $nombre, $apellido, $correo, $clave, $estado, $fecha_nacimiento, $telefono, $tipo_usuario, $imagen);
    }

	public static function autenticar(Persona $administrador){
        $conexion = new Conexion();
        $adminDao = new AdministradorDAO($conexion);
        //echo '<br>Es la funcion estatica autenticar del servicio para administradores<br>';
        $conexion -> iniciarConexion();
        $adminDao -> autenticar($administrador);
        $conexion -> cerrarConexion();
        if($conexion -> numFilas() > 0){
            $fila = $conexion -> extraer();
            $administrador -> setIdUsuario($fila[0]);
            return true;
        }
        return false;
    }
    public static function consultarPorId($id_user){
        $conexion = new Conexion();
        $adminDao = new AdministradorDAO($conexion);
        $conexion -> iniciarConexion();
        $adminDao -> consultarPorId( $id_user);
        if(!$fila = $conexion -> extraer()){
            $conexion -> cerrarConexion();
            return null;
        }else{
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
            $fila[8]
        );
        $conexion -> cerrarConexion();
        return $admin;
        }
    }

    public static function consultarTodos(){
        $administradores = array();
        $conexion = new Conexion();
        $adminDao = new AdministradorDAO($conexion);
        $conexion -> iniciarConexion();
        $adminDao -> consultarTodos();

        while($fila = $conexion -> extraer()){
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
        
        
        $conexion -> cerrarConexion();;
        return $administradores;
    }

    public static function insertar(Administrador $administrador){
        $conexion = new Conexion();
        $adminDAO = new AdministradorDAO($conexion);
        $conexion -> iniciarConexion();
        $adminDAO -> insertar($administrador);
        $administrador -> setidUsuario($conexion -> obtenerKey() + 1);
        $conexion -> cerrarConexion();
    }

    public static function actualizar(Administrador $administrador){
        $conexion = new Conexion();
        $adminDao = new AdministradorDAO($conexion);
        $conexion -> iniciarConexion();
        $resultado = $adminDao -> actualizar($administrador);
        $conexion -> cerrarConexion();
        return $resultado;
    }
    public static function eliminar($id){
        $conexion = new Conexion();
        $adminDao = new AdministradorDAO($conexion);
        $conexion -> iniciarConexion();
        $resultado = $adminDao -> eliminar($id);
        $conexion -> cerrarConexion();
        return $resultado;
    }
    
}
