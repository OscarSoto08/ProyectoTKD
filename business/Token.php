<?php 
/**
 * Summary of CodigoVerificacion
 */
class Token{
    private $id;
    private $codigo;
    private $motivo;
    private $fecha_creado;
    private $fecha_expirado;
    private $estado;
    private $usuario;

    public function __construct($id='', $codigo='', $motivo="", $fecha_creado='', $fecha_expirado='', $estado='', $usuario='') {
    	$this->id = $id;
    	$this->codigo = $codigo;
        $this -> motivo = $motivo;
    	$this->fecha_creado = $fecha_creado;
    	$this->fecha_expirado = $fecha_expirado;
    	$this->estado = $estado;
    	$this->usuario = $usuario;
    }

	public static function generarCodigo($longitud){
        return strtoupper(substr(bin2hex(random_bytes($longitud)), 0, $longitud));
    }

	public static function cambiarEstado(Token $Token){
        $conexion = new Conexion();
        $codigoDAO = new TokenDAO($conexion);
        $conexion -> iniciarConexion();
        $codigoDAO -> cambiarEstado($Token);
        $conexion -> cerrarConexion();
    }

    public function insertar(Token $token){
        $conexion = new Conexion();
        $codigoDAO = new TokenDAO($conexion);
        $conexion -> iniciarConexion();
        $resultado = $codigoDAO -> insertar($this);
        $token -> setId($conexion -> obtenerKey() + 1);
        // echo $token -> getId();
        // echo $token -> getCodigo();
        $conexion -> cerrarConexion();
        return $resultado;
    }

    public function consultarPorCodigo($codigo){
        $conexion = new Conexion();
        $codigoDAO = new TokenDAO($conexion);
        $conexion -> iniciarConexion();
        $codigoDAO -> consultarPorCodigo($codigo);
        // echo $codigo;
        if($resultado = $conexion -> extraer()){
            $this -> id = $resultado[0];
            $this -> codigo = $codigo;
            $this -> motivo = $resultado[1];
            $this -> estado = $resultado[2];
            $this -> fecha_creado = $resultado[3];
            $this -> fecha_expirado = $resultado[4];
            $this -> usuario =  Usuario::consultarPorId($resultado[5]);
        }
        $conexion -> cerrarConexion();
    }

	//GETTERS

	public function getId() { return $this -> id; }
	public function getCodigo() { return $this -> codigo; }
    public function getMotivo() {return $this->motivo; }
	public function getFecha_creado() { return $this -> fecha_creado; }
	public function getFecha_expirado() { return $this -> fecha_expirado; }
	public function getEstado() {return $this -> estado; }
	public function getUsuario() { return $this ->usuario; }


	//SETTERS

	public function setId($id){$this -> id = $id; }
	public function setcodigo($codigo) { $this -> codigo = $codigo; }
	public function setMotivo($motivo) { $this -> motivo = $motivo; }
    public function setFecha_creado($fecha_creado) { $this -> fecha_creado = $fecha_creado;}
	public function setFecha_expirado($fecha_expirado) { $this -> fecha_expirado = $fecha_expirado; }
	public function setEstado($estado) { $this -> estado = $estado; }
	public function setUsuario($usuario) { $this ->usuario = $usuario; }
}
