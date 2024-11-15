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
    

    public function filtrar($busqueda){
        $sql = "SELECT idEvento, nombre, descripcion, fecha_inicio, fecha_fin, Ciudad_idCiudad, precio, estado FROM evento WHERE idEvento LIKE '%{$busqueda}%' OR nombre LIKE '%{$busqueda}%' OR fecha_inicio LIKE '%{$busqueda}%' OR fecha_fin LIKE '%{$busqueda}%' OR precio LIKE '%{$busqueda}%' OR estado LIKE '%{$busqueda}%'";

        $this -> conexion -> ejecutarConsulta($sql);
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
        $sql = 'SELECT idEvento, nombre, descripcion, fecha_inicio, fecha_fin, Ciudad_idCiudad, precio, estado FROM evento WHERE 1 ORDER BY fecha_inicio DESC';
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