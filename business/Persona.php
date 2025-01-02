<?php 
class Persona{
	protected $idUsuario;
	protected $username;
    protected $nombre;
    protected $apellido;
    protected $correo;
    protected $clave;
    protected $estado;
    protected $fecha_nacimiento;
    protected $telefono;
	protected $tipo_usuario; //No hace falta una clase para tipo usuario porque solo manejo 3 datos, seria codigo innecesario
	protected $imagen;
	
	public function __construct($idUsuario, $username, $nombre, $apellido, $correo, $clave, $estado, $fecha_nacimiento, $telefono, $tipo_usuario, $imagen) {
		$this->idUsuario = $idUsuario;
		$this -> username = $username;
		$this->nombre = $nombre;
		$this->apellido = $apellido;
		$this->correo = $correo;
		$this->clave = $clave;
		$this->estado = $estado;
		$this->fecha_nacimiento = $fecha_nacimiento;
		$this->telefono = $telefono;
		$this->tipo_usuario = $tipo_usuario;
		$this->imagen = $imagen;
	}
	//GETTERS
	
	public function getIdUsuario() { return $this->idUsuario; }
	public function getUsername() {return $this -> username;}
	public function getNombre() { return $this->nombre; }
	public function getApellido() { return $this->apellido; }
	public function getCorreo() { return $this->correo; }
	public function getClave() { return $this->clave; }
	public function getEstado() { return $this->estado; }
	public function getFechaNacimiento() { return $this->fecha_nacimiento; }
	public function getTelefono() { return $this->telefono; }
	public function getTipoUsuario() { return $this->tipo_usuario; }
	public function getImagen() { return $this->imagen; }
	//SETTERS
	
	public function setIdUsuario($idUsuario) { $this->idUsuario = $idUsuario; }
	public function setUsername($username){$this -> username = $username; }
	public function setNombre($nombre) { $this->nombre = $nombre; }
	public function setApellido($apellido) { $this->apellido = $apellido; }
	public function setCorreo($correo) { $this->correo = $correo; }
	public function setClave($clave) { $this->clave = $clave; }
	public function setEstado($estado) { $this->estado = $estado; }
	public function setFechaNacimiento($fecha_nacimiento) { $this->fecha_nacimiento = $fecha_nacimiento; }
	public function setTelefono($telefono) { $this->telefono = $telefono; }
	public function setTipoUsuario($tipo_usuario) { $this->tipo_usuario = $tipo_usuario; }
	public function setImagen($imagen) { $this->imagen = $imagen; }
	/**
	 * @inheritDoc
	 */
    public function jsonSerialize(): array {
		return [
            'idUsuario' => $this->idUsuario,
            'nombre' => $this->nombre,
            'apellido' => $this->apellido,
            'correo' => $this->correo,
            'clave' => $this->clave,
            'estado' => $this->estado,
            'fecha_nacimiento' => $this->fecha_nacimiento,
            'telefono' => $this->telefono,
            'tipo_usuario' => $this->tipo_usuario,
            'imagen' => $this->imagen
        ];
	}
}