<?php 
class TempUserDAO extends DAO{
    
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
        $maxId = $this -> maxId() + 1;
        $sql = 'INSERT INTO `temporaluser`(`idUser`, `nombre`, `apellido`, `correo`, `clave`, `fechaNac`, `rol`) VALUES (?,?,?,?,?,?,?)';
        $tipos = 'issssss';
        $valores = [
            $maxId,
            $objeto->getNombre(),
            $objeto->getApellido(),
            $objeto->getCorreo(),
            $objeto->getClave(),
            $objeto->getFNac(),
            $objeto->getRol()
        ];
        if($this -> conexion -> prepararConsulta($sql, $tipos, ...$valores)) {
            return true;
        }
        return false;
    }

    
    /**
     * @inheritDoc
     */
    public function maxId() {
        $sql = "SELECT MAX(idUser) FROM TemporalUser;";
        $this -> conexion -> ejecutarConsulta($sql);
        $fila = $this -> conexion -> extraer();
        if($fila[0] == null){
            return 0;
        }
        return intval($fila[0]);
    }
}
?>