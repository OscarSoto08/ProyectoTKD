<?php
class estudianteServicio{
    private $conexion;
    private $EstDAO;
    public function __construct(){
        $this -> conexion = new Conexion();
        $this->EstDAO = new EstudianteDAO($this -> conexion);
    }
    public function consultarTodos(){
        $Estudiantes = array();
        $this -> conexion -> iniciarConexion();
        $this -> EstDAO -> consultarTodos();

        while($fila = $this -> conexion -> extraer()){
            $Estudiante = new Estudiante(
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
            array_push($Estudiantes, $Estudiante);
        }
        
        
        $this -> conexion -> cerrarConexion();;
        return $Estudiantes;
    }

    public function consultarPorId($id) {
        $this->conexion->iniciarConexion();
        $Estudiante = null; // Inicializamos en null
    
        if ($res = $this->EstDAO->consultarPorId($id)) { // Se espera que esto devuelva un boolean
            $fila = $this->conexion->extraer(); // Obtener la fila
            if ($fila) { // Verificamos si hay datos
                // Creamos un nuevo objeto Profesor con los datos de la fila
                $Estudiante = new Estudiante(
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
            }
        }
        $this -> conexion -> cerrarCOnexion();
        return $Estudiante;
    }    

    public function actualizar(Estudiante $Estudiante){
        $this -> conexion -> iniciarConexion();
        $res = $this -> EstDAO -> actualizar($Estudiante);
        $this -> conexion -> cerrarConexion();
        return $res;
    }

    public function insertar(Estudiante $Estudiante){
        $this -> conexion -> iniciarConexion();
        $res = $this -> EstDAO -> insertar($Estudiante);
        $this -> conexion -> cerrarConexion();
        return $res;
    }

    public function eliminar($idEstudiante){
        $this -> conexion -> iniciarConexion();
        $res = $this -> EstDAO -> eliminar($idEstudiante);
        $this -> conexion -> cerrarConexion();
        return $res;
    }
}
?>