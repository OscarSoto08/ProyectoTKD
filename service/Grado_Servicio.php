<?php
class Grado_Servicio{
    private $GradoDAO;
    private $conexion;
    public function __construct(){
        $this -> conexion = new Conexion();
        $this->GradoDAO = new GradoDAO($this -> conexion);
    }

    public static function consultarTodos(){
        $conexion = new Conexion();
        $GradoDAO = new GradoDAO($conexion);
        $conexion -> iniciarConexion();
        $GradoDAO -> consultarTodos();
        $grados = array();
        while($fila = $conexion -> extraer()){
            $grado = new Grado(
                $fila[0],
                $fila[1]
            );
            array_push($grados, $grado);
        }
        $conexion -> cerrarConexion();
        return $grados;
    }

    public static function consultar($idGrado){
        $conexion = new Conexion();
        $GradoDAO = new GradoDAO($conexion);
        $conexion -> iniciarConexion();
        $GradoDAO -> consultarPorId($idGrado);
        $fila = $conexion -> extraer();
        $conexion -> cerrarConexion();
        return new Grado($idGrado, $fila[0]);
    }

}