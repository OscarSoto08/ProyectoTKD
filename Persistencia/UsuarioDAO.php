<?php 
class UsuarioDAO extends DAO{
    
    /**
     * @inheritDoc
     */
    public function actualizar($objeto) {
        $sql = "UPDATE `usuario_temporal` SET `nombre`= ?,`apellido`= ?,`correo`= ?,`clave`= ?, `rol` = ?, `Grado_idGrado`= ?,`estado`= ?,`fechaNac`= ?, `telefono`= ? WHERE idUsuario_temporal = ?";
        $tipos = "sssssisssi";
        $valores = [
            $objeto -> getNombre(),
            $objeto -> getApellido(),
            $objeto -> getCorreo(),
            $objeto -> getClave(),
            $objeto -> getRol(),
            $objeto -> getGrado(),
            $objeto -> getEstado(),
            $objeto -> getFNac(),
            $objeto -> getTelefono(),
            $objeto -> getIdPersona()
        ];

        return $this -> conexion -> prepararConsulta($sql, $tipos, ...$valores);
    }
    
    /**
     * @inheritDoc
     */
    public function consultarPorId($id) {
        $sql = "SELECT `nombre`, `apellido`, `correo`, `clave`, `fechaNac`, `estado`, `telefono`, `rol`, `Grado_idGrado` FROM usuario_temporal WHERE `idUsuario_temporal` = ?";
        $tipos = "i";
        $this -> conexion -> prepararConsulta($sql, $tipos, $id);
    }
    
    /**
     * @inheritDoc
     */
    public function consultarTodos() {
        $sql = "SELECT `idUsuario_temporal`, `nombre`, `apellido`, `correo`, `clave`, `fechaNac`, `estado`, `telefono`, `rol`, `Grado_idGrado` FROM usuario_temporal WHERE 1";
        $this -> conexion -> ejecutarConsulta($sql);
    }
    
    /**
     * @inheritDoc
     */
    public function eliminar($id) {
        $sql = "DELETE FROM `usuario_temporal` WHERE idUsuario_temporal = ?";
        return $this -> conexion -> prepararConsulta($sql, 'i', $id);
    }
    
    /**
     * @inheritDoc
     */
    public function insertar($objeto) {
        $maxId = $this -> maxId() + 1;
        if($objeto -> getGrado() == null) $idGrado = null;
        else $idGrado = $objeto -> getGrado() -> getIdGrado();
        $sql = 'INSERT INTO `usuario_temporal`(`idUsuario_temporal`, `nombre`, `apellido`, `correo`, `clave`, `fechaNac`, `estado`, `telefono`, `rol`, `Grado_idGrado`) VALUES (?,?,?,?,?,?,?,?,?,?)';
        $tipos = 'issssssssi';
        $valores = [
            $maxId,
            $objeto->getNombre(),
            $objeto->getApellido(),
            $objeto->getCorreo(),
            $objeto->getClave(),
            $objeto->getFNac(),
            $objeto -> getEstado(),
            $objeto -> getTelefono(),
            $objeto->getRol(),
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
        $sql = "SELECT MAX(idUsuario_temporal) FROM usuario_temporal;";
        $this -> conexion -> ejecutarConsulta($sql);
        $fila = $this -> conexion -> extraer();
        if($fila[0] == null){
            return 0;
        }
        return intval($fila[0]);
    }

    public function verificar($correo){
        $sql = "SELECT `idUsuario`, `estado_registro` FROM usuario WHERE correo = ?";
        $tipos = 's';
        $valores = [ $correo];
        return $this -> conexion -> prepararConsulta($sql, $tipos,... $valores);
    }
}