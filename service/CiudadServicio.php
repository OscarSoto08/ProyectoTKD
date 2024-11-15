<?php 
class CiudadServicio{

    static function consultar($idCiudad){
        $conexion = new Conexion();
        $ciudadDAO = new CiudadDAO($conexion);
        $conexion -> iniciarConexion();
        if($ciudadDAO -> consultarPorId($idCiudad)){
            $conexion -> cerrarConexion();
            return new Ciudad($idCiudad, $conexion -> extraer()[0]);
        }
        return null;
    }
}