<?php
/**
 * Summary of Ciudad
 */
class Ciudad{
    private $id;
    private $nombre;
    private $pais;

    public function __construct($id=0, $nombre=0, $pais=0) {
    	$this->id = $id;
    	$this->nombre = $nombre;
    	$this->pais = $pais;
    }
	//GETTERS
	public function getId() { return $this -> id; }
	public function getNombre() { return $this -> nombre; }
	public function getPais() {return $this -> pais; }

	//SETTERS
	public function setId($id) { $this -> id = $id; }
	public function setNombre($nombre) { $this -> nombre = $nombre; }
	public function setPais($pais) { $this -> pais = $pais; }


	public static function consultar($idCiudad){
        $conexion = new Conexion();
        $ciudadDAO = new CiudadDAO($conexion);
        $conexion -> iniciarConexion();
        if($ciudadDAO -> consultarPorId($idCiudad)){
            $conexion -> cerrarConexion();
            return new Ciudad($idCiudad, $conexion -> extraer()[0], $conexion-> extraer()[1]);
        }
        return null;
    }

	
}