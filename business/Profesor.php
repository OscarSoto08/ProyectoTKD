<?php
class Profesor extends Persona {
    public function __construct($idUsuario = 0,$username="", $nombre = "", $apellido = "", $correo = "", $clave = "", $estado = "", $fecha_nacimiento = "", $telefono = "", $tipo_usuario = null, $imagen = "") {
        parent::__construct($idUsuario,$username,$nombre, $apellido, $correo, $clave, $estado, $fecha_nacimiento, $telefono, $tipo_usuario, $imagen);
    }
	public static function autenticar(Persona $profesor){
        $conexion = new Conexion();
        $profesorDAO = new ProfesorDAO($conexion);
        $conexion -> iniciarConexion();
        $profesorDAO -> autenticar($profesor -> getCorreo(), $profesor -> getClave());
        $conexion -> cerrarConexion();
        if($conexion -> numFilas() != 1) return false;

        $resultado = $conexion -> extraer();
        $profesor -> setIdUsuario($resultado[0]);
        return true;
    }

    public static function consultarTodos(){
        $conexion = new Conexion();
        $profesorDAO = new ProfesorDAO($conexion);
        $profesores = array();
        $conexion -> iniciarConexion();
        $profesorDAO -> consultarTodos();

        while($fila = $conexion -> extraer()){
            $profesor = new Profesor(
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
            array_push($profesores, $profesor);
        }
        
        
        $conexion -> cerrarConexion();
        return $profesores;
    }
    
    public static function consultarPorId($id_user){
        $conexion = new Conexion();
        $ProfesorDAO = new ProfesorDAO($conexion);
        $conexion -> iniciarConexion();
        $ProfesorDAO -> consultarPorId( $id_user);
        if(!$fila = $conexion -> extraer()){
        $Profesor = null;
        }else{
        $Profesor = new Profesor(
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
        return $Profesor;
        }
    }
    public static function actualizar(Profesor $profesor){
        $conexion = new Conexion();
        $profesorDAO = new ProfesorDAO($conexion);
        $conexion -> iniciarConexion();
        $res = $profesorDAO -> actualizar($profesor);
        $conexion -> cerrarConexion();
        return $res;
    }

    /**
     * Usado en el crud de usuarios y en registro
     */
    public function insertar(){
        $conexion = new Conexion();
        $ProfesorDAO = new ProfesorDAO($conexion);
        $conexion -> iniciarConexion();
        $ProfesorDAO -> insertar($this);
        $conexion -> cerrarConexion();
    }


    public static function eliminar($idProfesor){
        $conexion = new Conexion();
        $profesorDAO = new ProfesorDAO($conexion);
        $conexion -> iniciarConexion();
        $res = $profesorDAO -> eliminar($idProfesor);
        $conexion -> cerrarConexion();
        return $res;
    }
}
