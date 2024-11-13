<?php 
class Galeria_EventoDAO extends DAO{
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

    public function consultarPorIdEvento($idEvento) {
        $sql = 'SELECT idGaleria_Evento, imagen FROM galeria_evento WHERE idEvento = ?';
        $tipo = 'i';
        $valor = [$idEvento];
        return $this -> conexion -> prepararConsulta($sql,  $tipo, ...$valor);
    }   
    
    /**
     * @inheritDoc
     */
    public function consultarTodos() {
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