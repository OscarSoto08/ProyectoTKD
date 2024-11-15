<?php
class CodigoVerificacionServicio{

    public static function generarCodigo($longitud){
        return strtoupper(substr(bin2hex(random_bytes($longitud)), 0, $longitud));
    }

    public static function cambiarEstado(CodigoVerificacion $codigoVerificacion, $estado){
        $conexion = new Conexion();
        $codigoDAO = new CodigoVerificacionDAO($conexion);
        $conexion -> iniciarConexion();
        $codigoVerificacion -> setEstado($estado);
        $codigoDAO -> cambiarEstado( $codigoVerificacion);
        $conexion -> cerrarConexion();
    }

    public  static function insertar(CodigoVerificacion $codigoVerificacion){
        $conexion = new Conexion();
        $codigoDAO = new CodigoVerificacionDAO($conexion);
        $conexion -> iniciarConexion();
        $resultado = $codigoDAO -> insertar($codigoVerificacion);
        $conexion -> cerrarConexion();
        return $resultado;
    }
}