<?php
class ProfesorDAO extends DAO{
    public function __construct($conexion){
        parent::__construct($conexion);
    }

    public function autenticar($correo, $clave){
        $sql = 'SELECT idProfesor FROM profesor WHERE correo = ? AND clave = ?';
        $tipos = 'ss';
        $valores = [$correo, $clave];
        return $this -> conexion -> prepararConsulta($sql, $tipos, ...$valores);
    }
    /**
     * @inheritDoc
     */
    public function actualizar($objeto) {
        $sql = "UPDATE `profesor` SET `nombre`=?,`apellido`=?,`correo`=?,`clave`=?,`estado`=?,`imagen`=?,`fechaNac`=?,`telefono`=? WHERE `idProfesor` = ?";
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
    public function consultarPorCorreo($correo){
        $consulta = "SELECT idUsuario FROM usuario WHERE correo = ? and idTipo_usuario = ?";
        $tipos = 'si';
        return $this -> conexion -> prepararConsulta( $consulta, $tipos, ...[$correo, 2]); # El valor 2 es Profesor en la bd
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
    public function insertar($objeto){
        $sql = "CALL CrearUsuario(?,?,?,?,?,?,?,?,?,?,?,?)";
         $tipos = "issssssssisi";
         $valores = [
            $this -> maxId() + 1,
            $objeto -> getNombre(),
            $objeto -> getApellido(),
            $objeto -> getCorreo(),
            $objeto -> getClave(),
            $objeto -> getEstadoRegistro(),
            $objeto -> getFechaNacimiento(),
            $objeto -> getTelefono(),
            $objeto -> getImagen(),
            $objeto -> getTipoUsuario(),
            $objeto -> getEstado(),
            'xxxxxx'
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