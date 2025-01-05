<?php
class Estudiante extends Persona {

    private $grado;
    public function __construct($idUsuario = 0,$username="", $nombre = "", $apellido = "", $correo = "", $clave = "", $estado = "", $fecha_nacimiento = "", $telefono = "", $tipo_usuario = null, $imagen = "", $grado = null) {
        parent::__construct($idUsuario,$username,$nombre, $apellido, $correo, $clave, $estado, $fecha_nacimiento, $telefono, $tipo_usuario, $imagen);
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

    public static function consultarTodos(){
        $conexion = new Conexion();
        $EstDAO = new EstudianteDAO($conexion);
        $Estudiantes = array();
        $grados = array();
        $conexion -> iniciarConexion();
        $EstDAO -> consultarTodos();


        while($fila = $conexion -> extraer()){
            $grado = null;
            if(array_key_exists(key: $fila[9], array: $grados)){
                $grado = new Grado($fila[9], $grados[$fila[9]]);
            }else{
                $grado = Grado::consultar($fila[9]);
                array_push($grados, $grado);
            }

            $Estudiante = new Estudiante(
                idUsuario: $fila[0],
                username: $fila[1],
                nombre: $fila[2],
                apellido: $fila[3],
                correo: $fila[4],
                estado: $fila[5],
                fecha_nacimiento: $fila[6],
                telefono: $fila[7],
                imagen: $fila[8],
                grado: $grado
            );
            array_push($Estudiantes, $Estudiante);
        }
        $conexion -> cerrarConexion();;
        return $Estudiantes;
    }

    //Codigo documentado
    public static function consultarPorId($id_user){
        $conexion = new Conexion(); //Se crea una nueva conexion
        $EstudianteDAO = new EstudianteDAO($conexion);  //Se crea un nuevo objeto de tipo EstudianteDAO
        $conexion -> iniciarConexion(); //Se inicia la conexion
        $EstudianteDAO -> consultarPorId($id_user); //Se llama al metodo consultarPorId de EstudianteDAO
        $fila = $conexion -> extraer(); //Se obtiene la fila de la consulta
        $idGrado = $fila[0]; //Se obtiene el id del grado
        $estudiante = new Estudiante(   //Se crea un nuevo objeto de tipo Estudiante
            idUsuario: $id_user,
            username: $fila[1],
            nombre: $fila[2],
            apellido: $fila[3],
            correo: $fila[4],
            estado: $fila[5],
            fecha_nacimiento: $fila[6],
            telefono: $fila[7],
            imagen: $fila[8], //Se asignan los valores obtenidos de la consulta
        ); 
        $conexion -> cerrarConexion(); //Se cierra la conexion
        $grado = Grado::consultar($idGrado);    //Se obtiene el grado
        $estudiante -> setGrado($grado);    //Se asigna el grado al estudiante
        return $estudiante; //Se retorna el estudiante
    }

    public function actualizar(){
        $conexion = new Conexion();
        $EstDAO = new EstudianteDAO($conexion);
        $conexion -> iniciarConexion();
        $res = $EstDAO -> actualizar($this);
        $conexion -> cerrarConexion();
        return $res;
    }

    public function insertar(){
        $conexion = new Conexion();
        $EstudianteDAO = new EstudianteDAO($conexion);
        $conexion -> iniciarConexion();
        $EstudianteDAO -> insertar($this);
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
