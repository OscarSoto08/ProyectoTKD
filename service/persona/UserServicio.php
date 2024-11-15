<?php
class UserServicio{
    private $UserDAO;
    private $conexion;
    public function __construct(){
        $this -> conexion = new Conexion();
        $this->UserDAO = new UserDAO($this -> conexion);
    }

    public function actualizar(User $user){
        $this -> conexion -> iniciarConexion();
        
        $resultado = $this -> UserDAO -> actualizar($user);
        $this -> conexion -> cerrarConexion();
        return $resultado;
    }
    public function registrar(User $User){
        $this -> conexion -> iniciarConexion();
        
        if(!$this -> UserDAO -> insertar($User)) return false;

        $User -> setIdPersona($this -> conexion -> obtenerKey());
        return true;
    }

    public static function autenticar(Persona $User){
        $conexion = new Conexion();
        $conexion -> iniciarConexion();
        $UserDAO = new UserDAO( $conexion);
        $result = $UserDAO -> verificar($User -> getCorreo());
        if($result && $conexion -> numFilas() == 1){
            $registro = $conexion -> extraer();
            $User -> setIdPersona($registro[0]);
            $User -> setEstado( $registro[1]);
            $conexion -> cerrarConexion();
            return true;
        }
        $conexion -> cerrarConexion();
        return false;
    }

    public function consultarTodos(){
        $usuarios = [];
        $this -> conexion -> iniciarConexion();
        $this -> UserDAO -> consultarTodos();
        while($fila = $this -> conexion -> extraer()){
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
        $this -> conexion -> cerrarConexion();
        return $usuarios;
    }

    public function consultarPorId($id_user){
        $this -> conexion -> iniciarConexion();
        $this -> UserDAO -> consultarPorId($id_user);
        $fila = $this -> conexion -> extraer();
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
        $this -> conexion -> cerrarConexion();
        return $usuario;
    }

    public function insertar(User $user){
        $this -> conexion -> iniciarConexion();
        $res = $this -> UserDAO -> insertar($user);
        $this -> conexion -> cerrarConexion();
        return $res;
    }

    public function eliminar($id){
        $this -> conexion -> iniciarConexion();
        $resultado = $this -> UserDAO -> eliminar($id);
        $this -> conexion -> cerrarConexion();
        return $resultado;
    }
}