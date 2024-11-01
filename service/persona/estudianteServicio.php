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
                $Estudiante = new Estudiante();
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