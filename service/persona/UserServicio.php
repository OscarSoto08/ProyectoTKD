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
            $this -> conexion -> cerrarConexion();
            return true;
        }
        $this -> conexion -> cerrarConexion();
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
}
?>