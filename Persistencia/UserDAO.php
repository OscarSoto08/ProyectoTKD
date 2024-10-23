<?php 
class UserDAO extends DAO{
    
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
        $sql = 'INSERT INTO `user`(`idUser`, `nombre`, `apellido`, `correo`, `clave`, `fechaNac`, `rol`, `estado`, `idGrado`) VALUES (?,?,?,?,?,?,?,?,?)';
        $tipos = 'isssssssi';
        $valores = [
            $maxId,
            $objeto->getNombre(),
            $objeto->getApellido(),
            $objeto->getCorreo(),
            $objeto->getClave(),
            $objeto->getFNac(),
            $objeto->getRol(),
            $objeto -> getEstado(),
            $objeto -> getGrado() -> getIdGrado()
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
        $sql = "SELECT MAX(idUser) FROM user;";
        $this -> conexion -> ejecutarConsulta($sql);
        $fila = $this -> conexion -> extraer();
        if($fila[0] == null){
            return 0;
        }
        return intval($fila[0]);
    }

    public function verificar(User $user){
        $sql = "SELECT `idUser`, `estado` FROM user WHERE correo = ? AND clave = ?";
        $tipos = 'ss';
        $valores = [
            $user -> getCorreo(),
            $user -> getClave()
        ];
        return $this -> conexion -> prepararConsulta($sql, $tipos, ...$valores);
    }
}
?>