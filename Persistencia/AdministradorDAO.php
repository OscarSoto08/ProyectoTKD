<?php
require('DAO.php');
class AdministradorDAO extends DAO{

    private $idPersona;
    private $nombre;
    private $apellido;
    private $correo;
    private $clave;
    private $foto;
    private $telefono;
    private $estado;

    public function __construct($idPersona=0, $nombre="", $apellido="", $correo="", $clave="", $foto="", $telefono="", $estado=null, $conexion=null) {
        $this -> idPersona = $idPersona;
        $this -> nombre = $nombre;
        $this-> apellido = $apellido;
        $this->correo = $correo;
        $this -> clave = $clave;
        $this->foto = $foto;
        $this->telefono = $telefono;
        $this -> estado = $estado;
        $this->conexion = $conexion;
    }
    public function autenticar(){
        $consulta = "SELECT idAdministrador 
                    FROM Administrador 
                    WHERE correo = ? and clave = ?";
        $tipos = "ss";
        $valores = array($this->correo, $this->clave);
        $this->conexion -> prepararConsulta($consulta, $tipos, $valores);
    }
    public function consultarTodos(){
        
    }
    public function consultarPorId($id){}
    public function insertar($objeto){}
    public function actualizar($objeto){}
    public function eliminar($objeto){}
}
?>