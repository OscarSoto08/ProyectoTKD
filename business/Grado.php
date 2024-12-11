<?php
class Grado{
    private $idGrado;
    private $nombre;
    public function __construct($idGrado = null ,$nombre = null){
        $this->idGrado = $idGrado;
        $this->nombre = $nombre;
    }

    //GETTERS
    public function getIdGrado(){ return $this->idGrado; }
    public function getNombre(){ return $this->nombre; }

    //SETTERS
    public function setIdGrado($idGrado){ $this->idGrado = $idGrado; }
    public function setNombre($nombre){ $this->nombre = $nombre; }

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