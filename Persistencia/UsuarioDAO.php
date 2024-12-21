<?php 
class UsuarioDAO extends DAO{
    
    /**
     * @inheritDoc
     */
    public function actualizar($objeto) {
        $sql = "UPDATE usuario SET `nombre` = ?, `apellido` = ?, `correo` = ?, `estado` = ?, `fecha_nacimiento` = ?, `telefono` = ? WHERE idUsuario = ?";
        $tipos = "ssssssi";
        $valores = [
            $objeto -> getNombre(),
            $objeto -> getApellido(),
            $objeto -> getCorreo(),
            $objeto -> getEstado(),
            $objeto -> getFechaNacimiento(),
            $objeto -> getTelefono(),
            $objeto -> getIdUsuario()
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
        $sql = "SELECT `idUsuario`, `nombre`, `apellido`, `correo`, `clave`, `estado`, `fecha_nacimiento`, `telefono`, idTipo_usuario,`imagen` FROM usuario WHERE 1";
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
        $sql = "SELECT `idUsuario`, `estado` FROM usuario WHERE correo = ?";
        $tipos = 's';
        $valores = [ $correo];
        return $this -> conexion -> prepararConsulta($sql, $tipos,... $valores);
    }
    public function filtrar(Usuario $filtro){
        $sql = "SELECT `idUsuario`, `nombre`, `apellido`, `correo`, `clave`, `estado`, `fecha_nacimiento`, `telefono`, idTipo_usuario,`imagen`
                FROM usuario 
                WHERE nombre LIKE '%{$filtro->getNombre()}%' OR 
                    apellido LIKE '%{$filtro->getApellido()}%' OR 
                    correo LIKE '%{$filtro->getCorreo()}%' OR 
                    clave LIKE '%{$filtro->getClave()}%' OR 
                    estado LIKE '%{$filtro->getEstado()}%' OR 
                    fecha_nacimiento LIKE '%{$filtro->getFechaNacimiento()}%' OR
                    telefono LIKE '%{$filtro->getTelefono()}%' OR
                    idTipo_usuario LIKE '%{$filtro->getTipoUsuario()}%';";
        echo $sql;
        $this -> conexion -> ejecutarConsulta($sql);
    }

    public function filtrar_tipo_usuario($idTipo_usuario){
        return $this->conexion->ejecutarConsulta("SELECT `idUsuario`, `nombre`, `apellido`, `correo`, `clave`, `estado`, `fecha_nacimiento`, `telefono`, idTipo_usuario,`imagen`
                FROM usuario 
                WHERE idTipo_usuario = {$idTipo_usuario}");
    }
}