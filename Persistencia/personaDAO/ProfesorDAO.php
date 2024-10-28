<?php
class ProfesorDAO extends DAO{
    public function __construct($conexion){
        parent::__construct($conexion);
    }
    /**
     * @inheritDoc
     */
    public function actualizar($objeto) {
        $sql = "UPDATE `profesor` SET `nombre`=?,`apellido`=?,`correo`=?,`clave`=?,`estado`=?,`imagen`=?,`fechanac`=?,`telefono`=? WHERE `idProfesor` = ?";
        $tipos = 'ssssssssi';
        $valores = [
            $objeto -> getNombre(),
            $objeto -> getApellido(),
            $objeto -> getCorreo(),
            $objeto -> getClave(),
            $objeto -> getEstado(),
            $objeto -> getImagen(),
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
        $sql = "SELECT nombre, apellido, correo, clave, imagen, telefono, fechaNac, estado FROM profesor WHERE idProfesor = ?";
        $tipo = 's';
        return ($this -> conexion -> prepararConsulta($sql, $tipo, $id));
    }
    
    /**
     * @inheritDoc
     */
    public function consultarTodos() {
        $sql = "SELECT idProfesor, nombre, apellido, correo, clave, imagen, telefono, fechaNac, estado
        FROM profesor WHERE 1";
        $this -> conexion -> ejecutarConsulta($sql);
    }
    
    /**
     * @inheritDoc
     */
    public function eliminar($id) {
        $sql = "DELETE FROM `profesor` WHERE `profesor`.`idProfesor` = ?;";
        $tipo = "s";
        return $this -> conexion -> prepararConsulta($sql, $tipo, $id);
    }
    
    /**
     * @inheritDoc
     */
    public function insertar($objeto) {
        $nuevoId = $this -> maxId() + 1;
        $sql = "INSERT INTO `profesor`(`idProfesor`,`nombre`, `apellido`, `correo`, `clave`, `estado`, `imagen`, `fechaNac`, `telefono`) 
        VALUES (?,?,?,?,?,?,?,?,?)";
        $tipos = "issssssss";
        $valores = [
            $nuevoId,
            $objeto -> getNombre(),
            $objeto -> getApellido(),
            $objeto -> getCorreo(),
            $objeto -> getClave(),
            $objeto -> getEstado(),
            $objeto -> getImagen(),
            $objeto -> getFNac(), 
            $objeto -> getTelefono()
        ];
        return $this -> conexion -> prepararConsulta($sql, $tipos, ...$valores);
    }
    
    /**
     * @inheritDoc
     */
    public function maxId() {
        $sql = "SELECT MAX(idProfesor) FROM profesor;";
        $this -> conexion -> ejecutarConsulta($sql);
        $fila = $this -> conexion -> extraer();
        if($fila[0] == null){
            return 0;
        }
        return intval($fila[0]);
    }
}
?>