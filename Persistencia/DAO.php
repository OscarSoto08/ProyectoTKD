<?php
interface DAOInterface{
    public function consultarTodos();
    public function consultarPorId($id);
    public function insertar($objeto);
    public function actualizar($objeto);
    public function eliminar($id);
    public function maxId();
}
abstract class DAO implements DAOInterface{
    protected $conexion;

    public function getConexion(){
        return $this -> conexion;
    }

    public function setConexion(ConexionInterface $conexion){
        $this->conexion = $conexion;
    }

    public function __construct(ConexionInterface $conexion){
        $this -> conexion = $conexion;
    }
}