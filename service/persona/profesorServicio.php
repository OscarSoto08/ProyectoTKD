<?php
class ProfesorServicio{
    private $conexion;
    private $profesorDAO;
    public function __construct(){
        $this -> conexion = new Conexion();
        $this ->profesorDAO = new ProfesorDAO($this -> conexion);
    }

    public static function autenticar(Persona $profesor){
        $conexion = new Conexion();
        $profesorDAO = new ProfesorDAO($conexion);
        $conexion -> iniciarConexion();
        $profesorDAO -> autenticar($profesor -> getCorreo(), $profesor -> getClave());
        $conexion -> cerrarConexion();
        if($conexion -> numFilas() != 1) return false;

        $resultado = $conexion -> extraer();
        $profesor -> setIdPersona($resultado[0]);
        return true;
    }

    public function consultarTodos(){
        $profesores = array();
        $this -> conexion -> iniciarConexion();
        $this -> profesorDAO -> consultarTodos();

        while($fila = $this -> conexion -> extraer()){
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
        
        
        $this -> conexion -> cerrarConexion();;
        return $profesores;
    }

    public function consultarPorId($id) {
        $this->conexion->iniciarConexion();
    
        $this->profesorDAO->consultarPorId($id); // Se espera que esto devuelva un boolean
        $fila = $this->conexion->extraer(); // Obtener la fila

        // Creamos un nuevo objeto Profesor con los datos de la fila
        $profesor = new Profesor(
            $id, // $idProfesor
            $fila[0], // $nombre
            $fila[1], // $apellido
            $fila[2], // $correo
            $fila[3], // $clave
            $fila[4], // $foto
            $fila[5], // $telefono
            $fila[6], // $fNac
            $fila[7]  // $estado
        );
            
        
        $this -> conexion -> cerrarCOnexion();
        return $profesor;
    }    

    public function actualizar(Profesor $profesor){
        $this -> conexion -> iniciarConexion();
        $res = $this -> profesorDAO -> actualizar($profesor);
        $this -> conexion -> cerrarConexion();
        return $res;
    }

    public function insertar(Profesor $profesor){
        $this -> conexion -> iniciarConexion();
        $res = $this -> profesorDAO -> insertar($profesor);
        $this -> conexion -> cerrarConexion();
        return $res;
    }

    public function eliminar($idProfesor){
        $this -> conexion -> iniciarConexion();
        $res = $this -> profesorDAO -> eliminar($idProfesor);
        $this -> conexion -> cerrarConexion();
        return $res;
    }
}