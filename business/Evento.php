<?php
class Evento{
    private $id;
    private $nombre;
    private $descripcion;
    private $fecha_inicio;
    private $fecha_fin;
    private $ciudad;
    private $precio;
    private $estado;

    public function __construct($id, $nombre, $descripcion, $fecha_inicio, $fecha_fin, $ciudad, $precio, $estado){
        $this->id = $id;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->fecha_inicio = $fecha_inicio;
        $this->fecha_fin = $fecha_fin;
        $this->ciudad = $ciudad;
        $this->precio = $precio;
        $this->estado = $estado;
    }

    //GETTERS
    public function getId(){ return $this->id; }
    public function getNombre(){ return $this->nombre; }
    public function getDescripcion(){ return $this->descripcion; }
    public function getFecha_inicio(){ return $this->fecha_inicio; }
    public function getFecha_fin(){ return $this->fecha_fin; }
    public function getCiudad(){ return $this -> ciudad; }
    public function getPrecio() { return $this ->precio; }
    public function getEstado() { return $this -> estado; }

    //SETTERS
    public function setId($id){ $this->id = $id; }
    public function setNombre($nombre){ $this->nombre = $nombre; }
    public function setDescripcion($descripcion){ $this->descripcion = $descripcion; }
    public function setFecha_inicio($fecha_inicio){ $this->fecha_inicio = $fecha_inicio; }
    public function setFecha_fin($fecha_fin){ $this->fecha_fin = $fecha_fin; }
    public function setCiudad($ciudad){ $this -> ciudad = $ciudad; }
    public function setPrecio($precio){$this -> precio = $precio; }
    public function setEstado($estado) { $this->estado = $estado; }


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