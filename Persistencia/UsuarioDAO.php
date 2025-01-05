<?php 
class UsuarioDAO extends DAO{
    
    /**
     * @inheritDoc
     */
    //CRUD
    public function actualizar($objeto) {
        $id = $objeto->getIdUsuario();
        $username = $objeto->getUsername() ?? '';
        $nombre = $objeto->getNombre() ?? '';
        $apellido = $objeto->getApellido() ?? '';
        $correo = $objeto->getCorreo() ?? '';
        $clave = $objeto->getClave() ?? '';
        $estado = $objeto->getEstado() ?? '';
        $fechaNacimiento = $objeto->getFechaNacimiento() ?? '';
        $telefono = $objeto->getTelefono() ?? '';
        $imagen = $objeto->getImagen() ?? '';
        $tipoUsuario = $objeto->getTipoUsuario() ?? '';
        $gradoId = ($objeto instanceof Estudiante) ? $objeto->getGrado()->getIdGrado() : null;

        echo "tipo usuario" . $tipoUsuario;
        $sql = "UPDATE usuario SET username = '{$username}', nombre = '{$nombre}', apellido = '{$apellido}', correo = '{$correo}', clave = '{$clave}', estado = '{$estado}', fecha_nacimiento = '{$fechaNacimiento}', telefono = '{$telefono}', imagen = '{$imagen}', idTipo_usuario = '{$tipoUsuario}' WHERE idUsuario = '{$id}'";
        
        if($tipoUsuario == 2){
            $this -> conexion -> ejecutarConsulta("UPDATE estudiante SET Grado_idGrado = '{$gradoId}' WHERE idEstudiante = '{$id}'");
        }
        
        $this->conexion->ejecutarConsulta($sql);
    }
    
    /**
     * @inheritDoc
     */
    public function consultarPorId($id) {
        $sql = "SELECT username, nombre, apellido, correo, clave, estado, fecha_nacimiento, telefono, imagen, idTipo_usuario FROM usuario WHERE idUsuario = ?";
        $tipos = "i";
        $this -> conexion -> prepararConsulta($sql, $tipos, $id);
    }
    
    /**
     * @inheritDoc
     */
    public function consultarTodos() {
        $sql = "SELECT `idUsuario`, `nombre`, `apellido`, `correo`, `clave`, `estado`, `fecha_nacimiento`, `telefono`, `idTipo_usuario`,`imagen` FROM usuario WHERE 1";
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
        $id = $this -> maxId() + 1;
        $username = $objeto->getUsername() ?? '';
        $nombre = $objeto->getNombre() ?? '';
        $apellido = $objeto->getApellido() ?? '';
        $correo = $objeto->getCorreo() ?? '';
        $clave = $objeto->getClave() ?? '';
        $estado = $objeto->getEstado() ?? '';
        $fechaNacimiento = $objeto->getFechaNacimiento() ?? '';
        $telefono = $objeto->getTelefono() ?? '';
        $imagen = $objeto->getImagen() ?? '';
        $tipoUsuario = $objeto->getTipoUsuario() ?? '';
        $gradoId = ($objeto instanceof Estudiante) ? $objeto->getGrado()->getIdGrado() : null;


        $sql1 = "INSERT INTO Usuario (idUsuario, username, nombre, apellido, correo, clave, estado, fecha_nacimiento, telefono, imagen, idTipo_usuario)
        VALUES ('{$id}', '{$username}', '{$nombre}', '{$apellido}', '{$correo}', '{$clave}', '{$estado}', '{$fechaNacimiento}', '{$telefono}', '{$imagen}', '{$tipoUsuario}')";
        
        $sql2 = match($tipoUsuario){
            1 => "INSERT INTO administrador(idAdministrador) VALUES ('{$id}');",
            2 => "INSERT INTO estudiante(idEstudiante, Grado_idGrado) VALUES ('{$id}', '{$gradoId}')",
            3 => "INSERT INTO profesor(idProfesor) VALUES ('{$id}');"
        };
            
             

        echo $sql1 . " YYYYY " . $sql2;

        $this->conexion->ejecutarConsulta($sql1);
        $this->conexion->ejecutarConsulta($sql2);

        $objeto->setIdUsuario($id);
    }


    //Otros métodos
    
    public function autenticar($correo, $clave){
        $sql = "SELECT idUsuario, idTipo_usuario FROM usuario WHERE correo = ? AND clave = ?";
        $tipos = 'ss';
        return $this -> conexion -> prepararConsulta($sql, $tipos, $correo, $clave);
    }

    public function maxId() {
        $sql = "SELECT MAX(idUsuario) FROM usuario;";
        $this -> conexion -> ejecutarConsulta($sql);
        $fila = $this -> conexion -> extraer();
        if($fila[0] == null){
            return 0;
        }
        return intval($fila[0]);
    }

    public function verificar($correo){
        $sql = "SELECT `idUsuario`, `estado` FROM usuario WHERE correo = '{$correo}'";
        $this -> conexion -> ejecutarConsulta($sql);
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