<?php
class AdministradorDAO extends DAO{

    public function __construct($conexion=null) {
        parent::__construct( $conexion);
    }
    public function autenticar($admin){
        $consulta = "SELECT idUsuario 
                    FROM usuario  
                    WHERE correo = ? and clave = ? and idTipo_usuario = 1";
        $tipos = "ss";
        $valores = array($admin -> getCorreo(), $admin -> getClave());
        $this->conexion -> prepararConsulta($consulta, $tipos, ...$valores);
    }

    public function consultarPorCorreo($correo){
        $consulta = "SELECT idUsuario FROM usuario WHERE correo = ? and idTipo_usuario = ?";
        $tipos = 'si';
        return $this -> conexion -> prepararConsulta( $consulta, $tipos, ...[$correo, 1]); # El valor 1 es Administrador en la bd
    }

    public function consultarTodos(){
        $sql = "SELECT idAdministrador, nombre, apellido, correo, clave, imagen, telefono, fechaNac, estado
        FROM administrador WHERE 1";
        $this -> conexion -> ejecutarConsulta($sql);
    }
    public function consultarPorId($id){
        $consulta = "SELECT nombre, apellido, correo, clave, imagen, telefono, fecha_nacimiento  #, estado
                    FROM usuario
                    WHERE idUsuario = ? AND idTipo_usuario = 1;
        ";
        $tipos = "i";
        $valores = array($id);
        $this -> conexion -> prepararConsulta($consulta, $tipos, ...$valores);
    }
    public function insertar($objeto){
        $sql = "CALL CrearUsuario(?,?,?,?,?,?,?,?,?,?,?,NULL)";
         $tipos = "issssssssis";
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
            $objeto -> getEstado()
         ];
         return $this -> conexion -> prepararConsulta($sql, $tipos, ...$valores);
    }
    public function actualizar($objeto){
        $sql = "UPDATE `administrador` SET `nombre` = ? ,`apellido` = ?,`correo`= ?,`clave`= ?,`estado`= ?,`telefono`= ?,`imagen`= ?,`fechaNac`= ? WHERE `idAdministrador` = ?";   
        $tipos = 'ssssssssi';
        $valores = [
            $objeto -> getNombre(),
            $objeto -> getApellido(),
            $objeto -> getCorreo(),
            $objeto -> getClave(),
            $objeto -> getEstado(),
            $objeto -> getTelefono(),
            $objeto -> getImagen(),
            $objeto -> getFNac(),
            $objeto -> getIdPersona()
        ];
        return $this -> conexion -> prepararConsulta($sql, $tipos, ...$valores);
    }
    public function eliminar($id){
        $sql = "DELETE FROM administrador WHERE idAdministrador = ?";
        return $this -> conexion -> prepararConsulta($sql, 'i', $id);
    }
    /**
     * @inheritDoc
     */
    public function maxId() {
        $sql = "SELECT max(idAdministrador) FROM administrador";
        $this -> conexion -> ejecutarConsulta($sql);
        $resultado = $this -> conexion -> extraer();
        return $resultado[0];
    }
}
