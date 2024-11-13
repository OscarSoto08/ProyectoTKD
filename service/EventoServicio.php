<?php
class EventoServicio{
    private $eventoDAO;
    private $conexion;
    public function __construct(){
        $this -> conexion = new Conexion();
        $this->eventoDAO = new EventoDAO($this -> conexion);
    }

    public function consultarTodos(){
        $eventos = [];
        $this -> conexion -> iniciarConexion();
        $this -> eventoDAO -> consultarTodos();
        while($fila = $this -> conexion -> extraer()){
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
        $this -> conexion -> cerrarConexion();
        return $eventos;
    }
}