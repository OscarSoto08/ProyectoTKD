<?php
class GradoServicio{
    private $GradoDAO;
    public function __construct(){
        $conexion = new Conexion();
        $this->GradoDAO = new GradoDAO($conexion);
    }

    public function getTodosLosGrados(){
        $conexion = $this -> GradoDAO -> getConexion();
        $conexion -> iniciarConexion();
        $this -> GradoDAO -> consultarTodos();
        $grados = array();
        while($fila = $conexion -> extraer()){
            $grado = new Grado(
                $fila[0],
                $fila[1]
            );
            array_push($grados, $grado);
        }
        return $grados;
    }

    public function consultar(Grado $grado){
        $conexion = $this -> GradoDAO -> getConexion();
        $conexion -> iniciarConexion();
        $this -> GradoDAO -> consultarPorId($grado->getIdGrado());
        $fila = $conexion -> extraer();
        $grado -> setNombre($fila[0]);
    }
}