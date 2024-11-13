<?php
class GaleriaEventoServicio{
    private $GaleriaEventoDAO;
    private $conexion;

    public function __construct(){
        $this -> conexion = new Conexion();
        $this -> GaleriaEventoDAO = new Galeria_EventoDAO($this -> conexion);
    }

    public function consultarPorIdEvento(Evento $evento){
        $this -> conexion -> iniciarConexion();
        $imagenes = [];
        $resultado =  $this -> GaleriaEventoDAO -> consultarPorIdEvento( $evento -> getId() );
        if($resultado){
            while($fila = $this -> conexion -> extraer()){
                $GalEv = new Galeria_Evento(
                    $evento -> getId(),
                    $fila[0],
                    $fila[1]
                );

                array_push($imagenes, $GalEv);
            }
            $this -> conexion -> cerrarConexion();
            return $imagenes;
        }
    }
}