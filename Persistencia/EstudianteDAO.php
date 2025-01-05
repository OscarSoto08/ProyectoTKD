<?php 
class EstudianteDAO extends DAO{

    public function consultarPorCorreo($correo){
        $consulta = "SELECT idUsuario FROM usuario WHERE correo = ? and idTipo_usuario = ?";
        $tipos = 'si';
        return $this -> conexion -> prepararConsulta( $consulta, $tipos, ...[$correo, 3]); # El valor 3 es Estudiante en la bd
    }

    public function autenticar($correo, $clave){
        $sql = "SELECT idEstudiante FROM estudiante JOIN usuario ON idEstudiante = idUsuario WHERE correo = ? AND clave = ?";
        $tipos = 'ss';
        $valores = array($correo, $clave);
        $this -> conexion -> prepararConsulta( $sql, $tipos, ...$valores );
    }
    public function actualizar($objeto) {
        $sql = "UPDATE estudiante SET nombre = ?, apellido = ?, correo = ?, clave = ?, Grado_idGrado = ?, estado = ?, fechaNac = ?, imagen = ?, telefono = ? WHERE idEstudiante = ?";
        $tipos = 'ssssissssi';
        $valores = [
            $objeto -> getNombre(),
            $objeto -> getApellido(),
            $objeto -> getCorreo(),
            $objeto -> getClave(),
            $objeto -> getGrado(),
            $objeto -> getEstado(),
            $objeto -> getFNac(),
            $objeto -> getImagen(),
            $objeto -> getTelefono(),
            $objeto -> getIdPersona()
        ];

        return $this -> conexion -> prepararConsulta($sql, $tipos, ...$valores);
    }
    
    /**
     * @inheritDoc
     */
    public function consultarPorId($id){
        $consulta = "SELECT e.Grado_idGrado, u.username, u.nombre, u.apellido, u.correo, u.estado, u.fecha_nacimiento, u.telefono, u.imagen FROM estudiante e JOIN usuario u ON u.idUsuario = e.idEstudiante  WHERE u.idUsuario = $id";
        return $this -> conexion -> ejecutarConsulta($consulta);
    }
    
    /**
     * @inheritDoc
     */
    public function consultarTodos() {
        $sql = "SELECT u.idUsuario, u.username, u.nombre, u.apellido, u.correo, u.estado, u.fecha_nacimiento, u.telefono, u.imagen, e.Grado_idGrado
        FROM estudiante e JOIN usuario u ON u.idUsuario = e.idEstudiante";
        $this -> conexion -> ejecutarConsulta($sql);
    }
    
    /**
     * @inheritDoc
     */
    public function eliminar($id) {
        $sql = "DELETE FROM estudiante WHERE idEstudiante = ?";
        $tipos = "i";
        return $this -> conexion -> prepararConsulta($sql, $tipos, $id);
    }
    
    /**
     * @inheritDoc
     */
    public function insertar($objeto) {
        Usuario::insertar($objeto);
    }
    
    
    /**
     * @inheritDoc
     */
    public function maxId() {
        $sql = "SELECT MAX(idUsuario) FROM usuario;";
        $this -> conexion -> ejecutarConsulta($sql);
        $fila = $this -> conexion -> extraer();
        if($fila[0] == null){
            return 0;
        }
        return intval($fila[0]);
    }
}
