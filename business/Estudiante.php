<?php
class Estudiante extends Persona {

    private $grado;
    public function __construct($idUsuario = 0, $nombre = "", $apellido = "", $correo = "", $clave = "", $estado = "", $fecha_nacimiento = "", $telefono = "", $tipo_usuario = null, $imagen = "", $grado = null) {
        parent::__construct($idUsuario,$nombre, $apellido, $correo, $clave, $estado, $fecha_nacimiento, $telefono, $tipo_usuario, $imagen);
        $this -> grado = $grado;
    }
    //GETTERS
    public function getGrado(){ return $this -> grado; }
    //SETTERS
    public function setGrado($grado) { $this -> grado = $grado; }

	public static function autenticar(Persona $estudiante){
        $conexion = new Conexion();
        $EstDAO = new EstudianteDAO($conexion);
        $conexion -> iniciarConexion();
        //echo 'Es la funcion estatica autenticar del servicio para estudiantes';
        $EstDAO -> autenticar($estudiante -> getCorreo(), $estudiante -> getClave());
        if($conexion -> numFilas() == 1){
            $resultado = $conexion -> extraer();
            $estudiante -> setIdUsuario($resultado[0]);
            $conexion -> cerrarConexion();
            return true;
        }
        $conexion -> cerrarConexion();
        return false;
    }

    //Esta funcion se usa en sign-up solamente
    public static function consultarPorCorreo($correo){
        $conexion = new Conexion();
        $EstudianteDAO = new EstudianteDAO($conexion);
        $conexion -> iniciarConexion();
        if($EstudianteDAO -> consultarPorCorreo($correo)){
            $conexion -> cerrarConexion();
            if($conexion -> numFilas() > 0){
                return true;
            }
        }
        return false;
    }
    public static function consultarTodos(){
        $conexion = new Conexion();
        $EstDAO = new EstudianteDAO($conexion);
        $Estudiantes = array();
        $grados = array();
        $conexion -> iniciarConexion();
        $EstDAO -> consultarTodos();


        while($fila = $conexion -> extraer()){
            $grado = null;  
            if(array_key_exists(key: $fila[10], array: $grados)){
                $grado = new Grado($fila[10], $grados[$fila[10]]);
            }else{
                $grado = Grado::consultar($fila[10]);
                array_push($grados, $grado);
            }

            $Estudiante = new Estudiante(
                $fila[0],
                $fila[1],
                $fila[2],
                $fila[3],
                $fila[4],
                $fila[5],
                $fila[6],
                $fila[7],
                $fila[8],
                $fila[9],
                $grado
            );
            array_push($Estudiantes, $Estudiante);
        }
        $conexion -> cerrarConexion();;
        return $Estudiantes;
    }

    public static function consultarPorId($id_user){
        $conexion = new Conexion();
        $EstudianteDAO = new EstudianteDAO($conexion);
        $conexion -> iniciarConexion();
        $EstudianteDAO -> consultarPorId( $id_user);
        if(!$fila = $conexion -> extraer()){
            $conexion -> cerrarConexion();
            echo "algo pasa";
            return null;
        }else{
        $Estudiante = new Estudiante(
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
        return $Estudiante;
        }
    }

    public static function actualizar(Estudiante $Estudiante){
        $conexion = new Conexion();
        $EstDAO = new EstudianteDAO($conexion);
        $conexion -> iniciarConexion();
        $res = $EstDAO -> actualizar($Estudiante);
        $conexion -> cerrarConexion();
        return $res;
    }

    public static function insertar(Estudiante $estudiante){
        $conexion = new Conexion();
        $EstudianteDAO = new EstudianteDAO($conexion);
        $conexion -> iniciarConexion();
        $EstudianteDAO -> insertar($estudiante);
        $estudiante -> setidUsuario($conexion -> obtenerKey() + 1);
        $conexion -> cerrarConexion();
    }


    public static function eliminar($idEstudiante){
        $conexion = new Conexion();
        $EstDAO = new EstudianteDAO($conexion);
        $conexion -> iniciarConexion();
        $res = $EstDAO -> eliminar($idEstudiante);
        $conexion -> cerrarConexion();
        return $res;
    }
}
