<?php
/**
 * Clase padre que va a tener los atributos generales
 */
class Usuario extends Persona{

    public function __construct($idUsuario = 0, $nombre = "", $apellido = "", $correo = "", $clave = "", $estado = "", $fecha_nacimiento = "", $telefono = "", $tipo_usuario = null, $imagen = "") {
        parent::__construct($idUsuario,$nombre, $apellido, $correo, $clave, $estado, $fecha_nacimiento, $telefono, $tipo_usuario, $imagen);
    }
    
	public static function actualizar(Usuario $Usuario){
        $conexion = new Conexion();
        $UsuarioDAO = new UsuarioDAO($conexion);
        $conexion -> iniciarConexion();
        
        $resultado = $UsuarioDAO -> actualizar($Usuario);
        $conexion -> cerrarConexion();
        return $resultado;
    }
    public static function registrar(Usuario $Usuario){
        $conexion = new Conexion();
        $UsuarioDAO = new UsuarioDAO($conexion);
        $conexion -> iniciarConexion();
        
        if(!$UsuarioDAO -> insertar($Usuario)) return false;

        $Usuario -> setIdUsuario($conexion -> obtenerKey());
        return true;
    }

    public static function autenticar(Persona $Usuario){
        $conexion = new Conexion();
        $UsuarioDAO = new UsuarioDAO($conexion);
        $conexion -> iniciarConexion();
        $result = $UsuarioDAO -> verificar($Usuario -> getCorreo());
        if($result && $conexion -> numFilas() == 1){
            $registro = $conexion -> extraer();
            $Usuario -> setIdUsuario($registro[0]);
            $Usuario -> setEstado( $registro[1]);
            $conexion -> cerrarConexion();
            return true;
        }
        $conexion -> cerrarConexion();
        return false;
    }

    public static function consultarTodos(){
        $conexion = new Conexion();
        $UsuarioDAO = new UsuarioDAO($conexion);
        $usuarios = [];
        $conexion -> iniciarConexion();
        $UsuarioDAO -> consultarTodos();
        while($fila = $conexion -> extraer()){
            $usuario = new Usuario(
                $fila[0],
                $fila[1],
                $fila[2],
                $fila[3],
                $fila[4],
                $fila[5],
                $fila[6],
                $fila[7],
                $fila[8],
                $fila[9]
            );
            array_push($usuarios, $usuario);
            // `idUsuario_temporal`, `nombre`, `apellido`, `correo`, `clave`, `fechaNac`, `estado`, `telefono`, `rol`, `Grado_idGrado`
            // array_push($usuarios, $usuario);
        }
        $conexion -> cerrarConexion();
        return $usuarios;
    }

    public static function consultarPorId($id_Usuario){
        $conexion = new Conexion();
        $UsuarioDAO = new UsuarioDAO($conexion);
        $conexion -> iniciarConexion();
        $UsuarioDAO -> consultarPorId($id_Usuario);
        $fila = $conexion -> extraer();
        $usuario = new Usuario(
            $id_Usuario,
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
        return $usuario;
    }

    public static function insertar(Usuario $Usuario){
        $conexion = new Conexion();
        $UsuarioDAO = new UsuarioDAO($conexion);
        $conexion -> iniciarConexion();
        $res = $UsuarioDAO -> insertar($Usuario);
        $conexion -> cerrarConexion();
        return $res;
    }

    public static function eliminar($id){
        $conexion = new Conexion();
        $UsuarioDAO = new UsuarioDAO($conexion);
        $conexion -> iniciarConexion();
        $resultado = $UsuarioDAO -> eliminar($id);
        $conexion -> cerrarConexion();
        return $resultado;
    }
}
