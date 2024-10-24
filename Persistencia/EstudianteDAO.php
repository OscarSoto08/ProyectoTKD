<?php 
require 'DAO.php';
class EstudianteDAO extends DAO{

    public function __construct(Conexion $conexion){
        parent::__construct($conexion);
    }
    
    /**
     * @inheritDoc
     */
    public function actualizar($objeto) {
    }
    
    /**
     * @inheritDoc
     */
    public function consultarPorId($id) {
    }
    
    /**
     * @inheritDoc
     */
    public function consultarTodos() {
    }
    
    /**
     * @inheritDoc
     */
    public function eliminar($objeto) {
    }
    
    /**
     * @inheritDoc
     */
    public function insertar($objeto) {
    }

    public function consultarTodosLosGrados(){
        $consulta = "SELECT idGrado, grado
        FROM grado";
        $this -> conexion -> ejecutarConsulta($consulta);
    }
    /**
     * @inheritDoc
     */
    public function maxId() {
    }
}

?>