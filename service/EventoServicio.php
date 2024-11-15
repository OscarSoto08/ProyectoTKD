<?php
class EventoServicio{

    public static function consultarTodos(){
        $eventos = [];
        $conexion = new Conexion();
        $eventoDAO = new EventoDAO($conexion);
        $conexion -> iniciarConexion();
        $eventoDAO -> consultarTodos();
        while($fila = $conexion -> extraer()){
            $evento = new Evento(
                $fila["0"],
                $fila["1"],
                $fila["2"],
                $fila["3"],
                $fila["4"],
                $fila["5"],
                $fila["6"],
                $fila["7"]
            );
            array_push($eventos, $evento);
        }
        $conexion -> cerrarConexion();
        return $eventos;
    }

    public static function filtrar($entrada){
        $eventos = [];
        $conexion = new Conexion();
        $eventoDAO = new EventoDAO($conexion);
        $conexion -> iniciarConexion();
        $entrada = $conexion -> getMysqlConexion() -> real_escape_string($entrada);
        $eventoDAO -> filtrar($entrada);
        if($conexion -> numFilas() > 0){
            while($fila = $conexion -> extraer()){
                $evento = new Evento(
                    $fila["0"],
                    $fila["1"],
                    $fila["2"],
                    $fila["3"],
                    $fila["4"],
                    $fila["5"],
                    $fila["6"],
                    $fila["7"]
                );
                array_push($eventos, $evento);
            }

            $conexion -> cerrarConexion();
            return $eventos;
        }else{
            $conexion -> cerrarConexion();
            return null;
        }
    }
}