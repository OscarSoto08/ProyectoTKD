<?php
abstract class DAO{
    protected $conexion;
    public function getConexion(){
        return $this -> conexion;
    }
    public function setConexion($conexion){
        $this->conexion = $conexion;
    }
    public function __construct(Conexion $conexion){
        $this -> conexion = $conexion;
    }
    // METODOS DEL CRUD
    abstract function consultarTodos();
    abstract function consultarPorId($id);
    abstract function insertar($objeto);
    abstract function actualizar($objeto);
    abstract function eliminar($objeto);
    abstract function maxId();
}
?>