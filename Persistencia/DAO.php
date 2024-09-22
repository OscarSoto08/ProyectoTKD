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

    //Metodos de la clase conexion para un mejor acceso a la base de datos
    protected function iniciarConexion(){
        $this -> conexion -> iniciarConexion();
    }
    protected function ejecutarConsulta($query){
        $this -> conexion -> ejecutarConsulta($query);
    }
    protected function numFilas(){
        return $this -> conexion -> numFilas();
    }
    protected function extraer(){
        return $this -> extraer();
    }
    protected function preparar($sql){
        return $this -> preparar($sql);
    }
    protected function obtenerKey(){
        return $this -> obtenerKey();
    }
    protected function cerrarConexion(){
        $this -> cerrarConexion();
    }

}