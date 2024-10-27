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
    public function eliminar($id) {
    }
    
    /**
     * @inheritDoc
     */
    public function insertar($objeto) {
        $maxId = $this -> maxId() + 1;
        if($objeto -> getGrado() == null) $idGrado = null;
        else $idGrado = $objeto -> getGrado() -> getIdGrado();
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
            $idGrado    
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
        $sql = "SELECT `idUser`, `estado` FROM user WHERE correo = ?";
        $tipos = 's';
        $valores = $user -> getCorreo();
        return $this -> conexion -> prepararConsulta($sql, $tipos, $valores);
    }
}
?>