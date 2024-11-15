<?php
class UserServicio{
    public static function actualizar(User $user){
        $conexion = new Conexion();
        $UserDAO = new UserDAO($conexion);
        $conexion -> iniciarConexion();
        
        $resultado = $UserDAO -> actualizar($user);
        $conexion -> cerrarConexion();
        return $resultado;
    }
    public static function registrar(User $User){
        $conexion = new Conexion();
        $UserDAO = new UserDAO($conexion);
        $conexion -> iniciarConexion();
        
        if(!$UserDAO -> insertar($User)) return false;

        $User -> setIdPersona($conexion -> obtenerKey());
        return true;
    }

    public static function autenticar(Persona $User){
        $conexion = new Conexion();
        $UserDAO = new UserDAO($conexion);
        $conexion -> iniciarConexion();
        $result = $UserDAO -> verificar($User -> getCorreo());
        if($result && $conexion -> numFilas() == 1){
            $registro = $conexion -> extraer();
            $User -> setIdPersona($registro[0]);
            $User -> setEstado( $registro[1]);
            $conexion -> cerrarConexion();
            $conexion -> cerrarConexion();
            return true;
        }
        $conexion -> cerrarConexion();
        $conexion -> cerrarConexion();
        return false;
    }

    public static function consultarTodos(){
        $conexion = new Conexion();
        $UserDAO = new UserDAO($conexion);
        $usuarios = [];
        $conexion -> iniciarConexion();
        $UserDAO -> consultarTodos();
        while($fila = $conexion -> extraer()){
            $usuario = new User(
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

    public static function consultarPorId($id_user){
        $conexion = new Conexion();
        $UserDAO = new UserDAO($conexion);
        $conexion -> iniciarConexion();
        $UserDAO -> consultarPorId($id_user);
        $fila = $conexion -> extraer();
        $usuario = new User(
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
        return $usuario;
    }

    public static function insertar(User $user){
        $conexion = new Conexion();
        $UserDAO = new UserDAO($conexion);
        $conexion -> iniciarConexion();
        $res = $UserDAO -> insertar($user);
        $conexion -> cerrarConexion();
        return $res;
    }

    public static function eliminar($id){
        $conexion = new Conexion();
        $UserDAO = new UserDAO($conexion);
        $conexion -> iniciarConexion();
        $resultado = $UserDAO -> eliminar($id);
        $conexion -> cerrarConexion();
        return $resultado;
    }
}