<?php
class EstudianteServicio{

    public static function autenticar(Persona $estudiante){
        $conexion = new Conexion();
        $EstDAO = new EstudianteDAO($conexion);
        $conexion -> iniciarConexion();
        //echo 'Es la funcion estatica autenticar del servicio para estudiantes';
        $EstDAO -> autenticar($estudiante -> getCorreo(), $estudiante -> getClave());
        if($conexion -> numFilas() == 1){
            $resultado = $conexion -> extraer();
            $estudiante -> setIdPersona($resultado[0]);
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
        $conexion -> iniciarConexion();
        $EstDAO -> consultarTodos();

        while($fila = $conexion -> extraer()){
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
        $conexion -> cerrarConexion();;
        return $Estudiantes;
    }

    public static function consultarPorId($id) {
        $conexion = new Conexion();
        $EstDAO = new EstudianteDAO($conexion);
        $conexion->iniciarConexion();
        $Estudiante = null; // Inicializamos en null
        if ($EstDAO->consultarPorId($id)) { // Se espera que esto devuelva un boolean
            $fila = $conexion->extraer(); // Obtener la fila
            if ($fila) { 
                $Estudiante = new Estudiante(
                    $id,
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
            }
        }
        $conexion -> cerrarConexion();
        return $Estudiante;
    }    

    public static function actualizar(Estudiante $Estudiante){
        $conexion = new Conexion();
        $EstDAO = new EstudianteDAO($conexion);
        $conexion -> iniciarConexion();
        $res = $EstDAO -> actualizar($Estudiante);
        $conexion -> cerrarConexion();
        return $res;
    }

    public static function insertar(Estudiante $Estudiante){
        $conexion = new Conexion();
        $EstDAO = new EstudianteDAO($conexion);
        $conexion -> iniciarConexion();
        $res = $EstDAO -> insertar($Estudiante);
        $conexion -> cerrarConexion();
        return $res;
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