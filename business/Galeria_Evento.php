<?php 
class Galeria_Evento{
    private $Evento;
    private $idGaleria;
    private $imagen;

    public function __construct($Evento = '', $idGaleria = '', $imagen = ''){
        $this->Evento = $Evento;
        $this->idGaleria = $idGaleria;
        $this->imagen = $imagen;
    }
    //GETTERS

    public function getEvento(){ return $this -> Evento; }
    public function getIdGaleria(){ return $this -> idGaleria; }
    public function getImagen(){ return $this ->imagen; }
    //SETTERS

    public function setEvento($Evento) { $this -> Evento = $Evento; }
    public function setIdGaleria($idGaleria) { $this -> idGaleria = $idGaleria; }
    public function setImagen($imagen) { $this ->imagen = $imagen; }

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