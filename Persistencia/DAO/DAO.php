<?
require('Conexion.php');
abstract class DAO{
    protected $conexion;
    protected function getConexion(){
        return $this -> conexion;
    }
    protected function setConexion($conexion){
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
}