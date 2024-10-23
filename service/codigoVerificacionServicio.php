<?php
class CodigoVerificacionServicio{
    private $codigoDAO;
    private $conexion;
    public function __construct(){
        $this -> conexion = new Conexion();
        $this ->codigoDAO = new CodigoVerificacionDAO($this -> conexion);
    }

    public function generarCodigo($longitud){
        return strtoupper(substr(bin2hex(random_bytes($longitud)), 0, $longitud));
    }

    public function cambiarEstado(CodigoVerificacion $codigoVerificacion, $estado){
        $this -> conexion -> iniciarConexion();
        $codigoVerificacion -> setEstado($estado);
        $this -> codigoDAO -> cambiarEstado( $codigoVerificacion);
        $this -> conexion -> cerrarConexion();
    }

    public function insertar(CodigoVerificacion $codigoVerificacion){
        $this -> conexion -> iniciarConexion();
        $resultado = $this -> codigoDAO -> insertar($codigoVerificacion);
        $this -> conexion -> cerrarConexion();
        return $resultado;
    }
}
?>