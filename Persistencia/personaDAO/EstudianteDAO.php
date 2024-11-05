<?php 
class EstudianteDAO extends DAO{

    public function __construct(Conexion $conexion){
        parent::__construct($conexion);
    }
    
    /**
     * @inheritDoc
     */
    public function actualizar($objeto) {
        $sql = "UPDATE estudiante SET nombre = ?, apellido = ?, correo = ?, clave = ?, Grado_idGrado = ?, estado = ?, fechaNac = ?, imagen = ?, telefono = ? WHERE idEstudiante = ?";
        $tipos = 'ssssissssi';
        $valores = [
            $objeto -> getNombre(),
            $objeto -> getApellido(),
            $objeto -> getCorreo(),
            $objeto -> getClave(),
            $objeto -> getGrado() -> getIdGrado(),
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
    public function consultarPorId($id) {
        $sql = "SELECT nombre, apellido, correo, clave, Grado_idGrado, estado, fechaNac, imagen, telefono 
        FROM estudiante
        WHERE idEstudiante = ?";
        $tipo = "i";
        return $this -> conexion -> prepararConsulta($sql, $tipo, $id);
    }
    
    /**
     * @inheritDoc
     */
    public function consultarTodos() {
        $sql = "SELECT idEstudiante, nombre, apellido, correo, clave, Grado_idGrado, estado, fechaNac, imagen, telefono
        FROM estudiante WHERE 1";
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
        $sql = "INSERT INTO `estudiante`(`idEstudiante`, `nombre`, `apellido`, `correo`, `clave`, `Grado_idGrado`, `estado`, `fechaNac`, `imagen`, `telefono`) VALUES(?,?,?,?,?,?,?,?,?,?)";
        $tipos = "issssissss";
        $valores = [
            $objeto -> getIdPersona(),
            $objeto -> getNombre(),
            $objeto -> getApellido(),
            $objeto -> getCorreo(),
            $objeto -> getClave(),
            $objeto -> getGrado() -> getIdGrado(),
            $objeto -> getEstado(),
            $objeto -> getFNac(),
            $objeto -> getImagen(),
            $objeto -> getTelefono()
        ];
        return $this -> conexion -> prepararConsulta($sql, $tipos, ...$valores);
    }
    /**
     * @inheritDoc
     */
    public function maxId() {
        $sql = "SELECT MAX(idEstudiante) FROM estudiante;";
        $this -> conexion -> ejecutarConsulta($sql);
        $fila = $this -> conexion -> extraer();
        if($fila[0] == null){
            return 0;
        }
        return intval($fila[0]);
    }
}

?>