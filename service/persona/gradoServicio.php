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

    public function consultar(Grado $grado){
        $this -> conexion -> iniciarConexion();
        $this -> GradoDAO -> consultarPorId($grado->getIdGrado());
        $fila = $this -> conexion -> extraer();
        $this -> conexion -> cerrarConexion();
        $grado -> setNombre($fila[0]);
    }
}