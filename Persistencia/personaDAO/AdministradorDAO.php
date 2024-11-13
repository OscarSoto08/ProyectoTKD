<?php
class AdministradorDAO extends DAO{

    public function __construct($conexion=null) {
        parent::__construct( $conexion);
    }
    public function autenticar($admin){
        $consulta = "SELECT idAdministrador 
                    FROM administrador 
                    WHERE correo = ? and clave = ?";
        $tipos = "ss";
        $valores = array($admin -> getCorreo(), $admin -> getClave());
        $this->conexion -> prepararConsulta($consulta, $tipos, ...$valores);
    }
    public function consultarTodos(){
        $sql = "SELECT idAdministrador, nombre, apellido, correo, clave, imagen, telefono, fechaNac, estado
        FROM administrador WHERE 1";
        $this -> conexion -> ejecutarConsulta($sql);
    }
    public function consultarPorId($id){
        $consulta = "SELECT nombre, apellido, correo, clave, imagen, telefono, fechaNac, estado
                    FROM administrador
                    WHERE idAdministrador = ?;
        ";
        $tipos = "i";
        $valores = array($id);
        $this -> conexion -> prepararConsulta($consulta, $tipos, ...$valores);
    }
    public function insertar($objeto){
        $sql = "INSERT INTO `administrador`(`idAdministrador`, `nombre`, `apellido`, `correo`, `clave`, `estado`, `telefono`, `imagen`, `fechaNac`) VALUES (?,?,?,?,?,?,?,?,?)";
         $tipos = "issssssss";
         $objeto -> setIdPersona($this -> maxId() + 1);
         $valores = [
            $objeto -> getIdPersona(),
            $objeto -> getNombre(),
            $objeto -> getApellido(),
            $objeto -> getCorreo(),
            $objeto -> getClave(),
            $objeto -> getEstado(),
            $objeto -> getTelefono(),
            $objeto -> getImagen(),
            $objeto -> getFNac()
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
