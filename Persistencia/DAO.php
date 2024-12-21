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
    abstract public function consultarTodos();
    abstract public function consultarPorId($id);
    abstract public function insertar($objeto);
    abstract public function actualizar($objeto);
    abstract public function eliminar($id);
    abstract public function maxId();
}