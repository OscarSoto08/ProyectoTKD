<?php 
class CodigoVerificacion{
    private $id;
    private $contenido_codigo;
    private $fecha_creado;
    private $fecha_expirado;
    private $estado;
    private $usuario;


    /**
     * @param mixed $id
     * @param mixed $contenido_codigo
     * @param mixed $fecha_creado
     * @param mixed $fecha_expirado
     * @param mixed $estado
     * @param mixed $usuario
     */
    public function __construct($id='', $contenido_codigo='', $fecha_creado='', $fecha_expirado='', $estado='', $usuario='') {
    	$this->id = $id;
    	$this->contenido_codigo = $contenido_codigo;
    	$this->fecha_creado = $fecha_creado;
    	$this->fecha_expirado = $fecha_expirado;
    	$this->estado = $estado;
    	$this->usuario = $usuario;
    }

	/**
	 * @return mixed
	 */
	public function getId() {
		return $this->id;
	}
	
	/**
	 * @param mixed $id 
	 * @return self
	 */
	public function setId($id): self {
		$this->id = $id;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getContenidoCodigo() {
		return $this->contenido_codigo;
	}
	
	/**
	 * @param mixed $contenido_codigo 
	 * @return self
	 */
	public function setContenidoCodigo($contenido_codigo): self {
		$this->contenido_codigo = $contenido_codigo;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getFechaCreado() {
		return $this->fecha_creado;
	}
	
	/**
	 * @param mixed $fecha_creado 
	 * @return self
	 */
	public function setFechaCreado($fecha_creado): self {
		$this->fecha_creado = $fecha_creado;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getFechaExpirado() {
		return $this->fecha_expirado;
	}
	
	/**
	 * @param mixed $fecha_expirado 
	 * @return self
	 */
	public function setFechaExpirado($fecha_expirado): self {
		$this->fecha_expirado = $fecha_expirado;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getEstado() {
		return $this->estado;
	}
	
	/**
	 * @param mixed $estado 
	 * @return self
	 */
	public function setEstado($estado): self {
		$this->estado = $estado;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getUsuario() {
		return $this->usuario;
	}
	
	/**
	 * @param mixed $usuario 
	 * @return self
	 */
	public function setUsuario($usuario): self {
		$this->usuario = $usuario;
		return $this;
	}
}
