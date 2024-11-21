<?php
/**
 * Clase padre que va a tener los atributos generales
 */
class Usuario{
    protected $idUsuario;
    protected $nombre;
    protected $apellido;
    protected $correo;
    protected $clave;
    protected $estado_registro;
    protected $fecha_nacimiento;
    protected $telefono;
	protected $tipo_usuario; //No hace falta una clase para tipo usuario porque solo manejo 3 datos, seria codigo innecesario
	protected $imagen;
	
/**
	 * @param mixed $idUsuario
	 * @param mixed $nombre
	 * @param mixed $apellido
	 * @param mixed $correo
	 * @param mixed $clave
	 * @param mixed $estado_registro
	 * @param mixed $fecha_nacimiento
	 * @param mixed $telefono
	 * @param mixed $tipo_usuario
	 * @param mixed $imagen
	 */
	public function __construct($idUsuario, $nombre, $apellido, $correo, $clave, $estado_registro, $fecha_nacimiento, $telefono, $tipo_usuario, $imagen) {
		$this->idUsuario = $idUsuario;
		$this->nombre = $nombre;
		$this->apellido = $apellido;
		$this->correo = $correo;
		$this->clave = $clave;
		$this->estado_registro = $estado_registro;
		$this->fecha_nacimiento = $fecha_nacimiento;
		$this->telefono = $telefono;
		$this->tipo_usuario = $tipo_usuario;
		$this->imagen = $imagen;
	}

	
	/**
	 * @return mixed
	 */
	public function getNombre() {
		return $this->nombre;
	}
	
	/**
	 * @param mixed $nombre 
	 * @return self
	 */
	public function setNombre($nombre): self {
		$this->nombre = $nombre;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getApellido() {
		return $this->apellido;
	}
	
	/**
	 * @param mixed $apellido 
	 * @return self
	 */
	public function setApellido($apellido): self {
		$this->apellido = $apellido;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getCorreo() {
		return $this->correo;
	}
	
	/**
	 * @param mixed $correo 
	 * @return self
	 */
	public function setCorreo($correo): self {
		$this->correo = $correo;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getClave() {
		return $this->clave;
	}
	
	/**
	 * @param mixed $clave 
	 * @return self
	 */
	public function setClave($clave): self {
		$this->clave = $clave;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getEstadoRegistro() {
		return $this->estado_registro;
	}
	
	/**
	 * @param mixed $estado_registro 
	 * @return self
	 */
	public function setEstadoRegistro($estado_registro): self {
		$this->estado_registro = $estado_registro;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getFechaNacimiento() {
		return $this->fecha_nacimiento;
	}
	
	/**
	 * @param mixed $fecha_nacimiento 
	 * @return self
	 */
	public function setFechaNacimiento($fecha_nacimiento): self {
		$this->fecha_nacimiento = $fecha_nacimiento;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getTelefono() {
		return $this->telefono;
	}
	
	/**
	 * @param mixed $telefono 
	 * @return self
	 */
	public function setTelefono($telefono): self {
		$this->telefono = $telefono;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getTipoUsuario() {
		return $this->tipo_usuario;
	}
	
	/**
	 * @param mixed $tipo_usuario 
	 * @return self
	 */
	public function setTipoUsuario($tipo_usuario): self {
		$this->tipo_usuario = $tipo_usuario;
		return $this;
	}
	/**
	 * @return mixed
	 */
	public function getIdUsuario() {
		return $this->idUsuario;
	}
	
	/**
	 * @param mixed $idUsuario 
	 * @return self
	 */
	public function setIdUsuario($idUsuario): self {
		$this->idUsuario = $idUsuario;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getImagen() {
		return $this->imagen;
	}
	
	/**
	 * @param mixed $imagen 
	 * @return self
	 */
	public function setImagen($imagen): self {
		$this->imagen = $imagen;
		return $this;
	}

	
}
