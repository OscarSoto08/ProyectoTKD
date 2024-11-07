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
        
        if(!$this -> UserDAO -> insertar($User)) return false;

        $User -> setIdPersona($this -> conexion -> obtenerKey());

        $codigoServ = new CodigoVerificacionServicio();
        $idCodigo = $codigoServ -> generarCodigo(6);
        $fecha_creado = date('Y-m-d H:i:s');
        $fecha_expirado = date('Y-m-d H:i:s', strtotime('+10 minutes'));
        $estado = 'valido';

        $codigo = new CodigoVerificacion($idCodigo, $fecha_creado, $fecha_expirado, $estado, $User);

        //agregar el codigo a la bd
        $codigoServ -> insertar($codigo);
        
        $mailRegistro = new EmailRegistro(
            $User->getCorreo(),
            $User->getNombre(),
            $idCodigo
        );

        //faltaria enviar el codigo a la base de datos
        $mailRegistro -> enviarCorreo();
        return $codigo;
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