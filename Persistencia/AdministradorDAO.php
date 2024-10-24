<?php
require('DAO.php');
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
        
    }
    public function consultarPorId($id){
        $consulta = "SELECT nombre, apellido, correo
                    FROM administrador
                    WHERE idAdministrador = ?;
        ";
        $tipos = "i";
        $valores = array($id);
        $this -> conexion -> prepararConsulta($consulta, $tipos, $valores);
    }
    public function insertar($objeto){}
    public function actualizar($objeto){}
    public function eliminar($objeto){}
    /**
     * @inheritDoc
     */
    public function maxId() {
    }
}
?>