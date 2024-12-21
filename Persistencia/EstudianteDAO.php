<?php 
class EstudianteDAO extends DAO{

    public function __construct(Conexion $conexion){
        parent::__construct($conexion);
    }
    

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
        $consulta = "SELECT nombre, apellido, correo, clave, estado, fecha_nacimiento, telefono, idTipo_usuario, imagen
                    FROM usuario
                    WHERE idUsuario = ?;
        ";
        $tipos = "i";
        $valores = [$id];
        $this -> conexion -> prepararConsulta($consulta, $tipos, ...$valores);
    }
    
    /**
     * @inheritDoc
     */
    public function consultarTodos() {
        $sql = "SELECT u.idUsuario, u.nombre, u.apellido, u.correo, u.clave, u.estado, u.fecha_nacimiento, u.telefono, u.idTipo_usuario, u.imagen, e.Grado_idGrado
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
        // Definir la consulta del procedimiento almacenado
        $sql = "CALL CrearUsuario(?,?,?,?,?,?,?,?,?,?,?)";
        $objeto = new Estudiante();
        // Definir los tipos de los parámetros (tipos en función de los datos que recibimos)
        $tipos = "isssssssisi";
        
        // Obtener los valores del objeto
        $valores = [
            $this -> maxId() + 1,
            $objeto->getNombre(),                // Nombre
            $objeto->getApellido(),              // Apellido
            $objeto->getCorreo(),                // Correo
            $objeto->getClave(),                 // Clave
            $objeto->getEstado(),               // Estado de registro
            $objeto->getFechaNacimiento(),      // Fecha de nacimiento
            $objeto->getTelefono(),              // Teléfono
            $objeto->getTipoUsuario(),           // Tipo de usuario (1, 2, 3)
            $objeto->getImagen(),                // Imagen
            $objeto->getGrado()->getIdGrado()    // ID del grado (si `getGrado()` es un objeto con el método `getIdGrado()`)
        ];
        // Llamar al método prepararConsulta para ejecutar el procedimiento
        $this->conexion->prepararConsulta($sql, $tipos, ...$valores);
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
