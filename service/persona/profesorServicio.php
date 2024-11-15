<?php
class ProfesorServicio{

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

    public static function consultarTodos(){
        $conexion = new Conexion();
        $profesorDAO = new ProfesorDAO($conexion);
        $profesores = array();
        $conexion -> iniciarConexion();
        $profesorDAO -> consultarTodos();

        while($fila = $conexion -> extraer()){
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
        
        
        $conexion -> cerrarConexion();
        return $profesores;
    }

    public static function consultarPorId($id) {
        $conexion = new Conexion();
        $profesorDAO = new ProfesorDAO($conexion);
        $conexion->iniciarConexion();
    
        $profesorDAO->consultarPorId($id); // Se espera que esto devuelva un boolean
        $fila = $conexion->extraer(); // Obtener la fila

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
            
        
        $conexion -> cerrarCOnexion();
        return $profesor;
    }    

    public static function actualizar(Profesor $profesor){
        $conexion = new Conexion();
        $profesorDAO = new ProfesorDAO($conexion);
        $conexion -> iniciarConexion();
        $res = $profesorDAO -> actualizar($profesor);
        $conexion -> cerrarConexion();
        return $res;
    }

    public static function insertar(Profesor $profesor){
        $conexion = new Conexion();
        $profesorDAO = new ProfesorDAO($conexion);
        $conexion -> iniciarConexion();
        $res = $profesorDAO -> insertar($profesor);
        $conexion -> cerrarConexion();
        return $res;
    }

    public static function eliminar($idProfesor){
        $conexion = new Conexion();
        $profesorDAO = new ProfesorDAO($conexion);
        $conexion -> iniciarConexion();
        $res = $profesorDAO -> eliminar($idProfesor);
        $conexion -> cerrarConexion();
        return $res;
    }
}