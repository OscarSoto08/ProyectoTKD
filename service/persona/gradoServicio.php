<?php
class GradoServicio{
    private $GradoDAO;
    private $conexion;
    public function __construct(){
        $this -> conexion = new Conexion();
        $this->GradoDAO = new GradoDAO($this -> conexion);
    }

    public function getTodosLosGrados(){
        $this -> conexion -> iniciarConexion();
        $this -> GradoDAO -> consultarTodos();
        $grados = array();
        while($fila = $this -> conexion -> extraer()){
            $grado = new Grado(
                $fila[0],
                $fila[1]
            );
            array_push($grados, $grado);
        }
        $this -> conexion -> cerrarConexion();
        return $grados;
    }

    public function consultar($idGrado){
        $this -> conexion -> iniciarConexion();
        $this -> GradoDAO -> consultarPorId($idGrado);
        $fila = $this -> conexion -> extraer();
        $this -> conexion -> cerrarConexion();
        return $fila[0];
    }

    public function consultarTodos(){
        $grados = array();
        $this -> conexion -> iniciarConexion();
        $this -> GradoDAO -> consultarTodos();
        while($fila = $this -> conexion -> extraer()){
            $grado = new Grado($fila[0], $fila[1]);
            array_push($grados, $grado);
        }
        $this -> conexion -> cerrarConexion();
        return $grados;
    }

}