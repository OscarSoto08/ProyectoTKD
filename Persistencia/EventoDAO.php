<?php

class EventoDAO extends DAO {
    public function __construct($conexion) {
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
        $sql = 'SELECT idEvento, nombre, descripcion, fecha_inicio, fecha_fin, Ciudad_idCiudad, precio, estado FROM evento';
        $this -> conexion -> ejecutarConsulta($sql);
    }
    
    /**
     * @inheritDoc
     */
    public function eliminar($id) {
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