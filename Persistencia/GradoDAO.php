<?php
class GradoDAO extends DAO{
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
        $sql = "SELECT grado
        FROM grado
        WHERE idGrado = ?";
        $tipos = "i";
        $valores = $id;
        $this -> conexion -> prepararConsulta($sql,$tipos,$valores);
    }
    
    /**
     * @inheritDoc
     */
    public function consultarTodos() {
        $sql = "SELECT idGrado, grado
        FROM grado WHERE 1";
        $this -> conexion -> ejecutarConsulta($sql);
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
    /**
     * @inheritDoc
     */
    public function maxId() {
    }

}
?>