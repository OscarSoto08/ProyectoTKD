<?php 
/**
 * Summary of CodigoVerificacion
 */
class CodigoVerificacion{
    private $id;
    private $contenido_codigo;
    private $fecha_creado;
    private $fecha_expirado;
    private $estado;
    private $usuario;

    public function __construct($id='', $contenido_codigo='', $fecha_creado='', $fecha_expirado='', $estado='', $usuario='') {
    	$this->id = $id;
    	$this->contenido_codigo = $contenido_codigo;
    	$this->fecha_creado = $fecha_creado;
    	$this->fecha_expirado = $fecha_expirado;
    	$this->estado = $estado;
    	$this->usuario = $usuario;
    }

	

	public static function cambiarEstado(CodigoVerificacion $codigoVerificacion, $estado){
        $conexion = new Conexion();
        $codigoDAO = new CodigoVerificacionDAO($conexion);
        $conexion -> iniciarConexion();
        $codigoVerificacion -> setEstado($estado);
        $codigoDAO -> cambiarEstado($codigoVerificacion);
        $conexion -> cerrarConexion();
    }

    public  static function insertar(CodigoVerificacion $codigoVerificacion){
        $conexion = new Conexion();
        $codigoDAO = new CodigoVerificacionDAO($conexion);
        $conexion -> iniciarConexion();
        $resultado = $codigoDAO -> insertar($codigoVerificacion);
        $codigoVerificacion -> setId($conexion -> obtenerKey() + 1);
        echo $codigoVerificacion -> getId();
        $conexion -> cerrarConexion();
        return $resultado;
    }

	//GETTERS

	public function getId() { return $this -> id; }
	public function getContenido_Codigo() { return $this -> contenido_codigo; }
	public function getFecha_creado() { return $this -> fecha_creado; }
	public function getFecha_expirado() { return $this -> fecha_expirado; }
	public function getEstado() {return $this -> estado; }
	public function getUsuario() { return $this ->usuario; }


	//SETTERS

	public function setId($id){$this -> id = $id; }
	public function setContenido($contenido_codigo) { $this -> contenido_codigo = $contenido_codigo; }
	public function setFecha_creado($fecha_creado) { $this -> fecha_creado = $fecha_creado;}
	public function setFecha_expirado($fecha_expirado) { $this -> fecha_expirado = $fecha_expirado; }
	public function setEstado($estado) { $this -> estado = $estado; }
	public function setUsuario($usuario) { $this ->usuario = $usuario; }
}
