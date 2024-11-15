<?php
class GaleriaEventoServicio{

    public static function consultarPorIdEvento(Evento $evento){
        $conexion = new Conexion();
        $GaleriaEventoDAO = new Galeria_EventoDAO($conexion);
        $conexion -> iniciarConexion();
        $imagenes = [];
        $resultado =  $GaleriaEventoDAO -> consultarPorIdEvento( $evento -> getId() );
        if($resultado){
            while($fila = $conexion -> extraer()){
                $GalEv = new Galeria_Evento(
                    $evento -> getId(),
                    $fila[0],
                    $fila[1]
                );

                array_push($imagenes, $GalEv);
            }
            $conexion -> cerrarConexion();
            return $imagenes;
        }
        return null;
    }
}