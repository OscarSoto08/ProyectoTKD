<?php
class Estudiante extends Usuario {
    private $grado;
    private $estado;
    /**
     * @param mixed $estado
     * @param mixed $grado, Instancia de la clase grado
     */
    public function __construct($idPersona='', $nombre='', $apellido='', $correo='', $clave='', $estado_registro='', $fecha_nacimiento='', $telefono='', $tipo_usuario = '', $estado='', $grado = '', $imagen = null){
        parent::__construct($idPersona, $nombre, $apellido, $correo, $clave, $estado_registro, $fecha_nacimiento, $telefono, $tipo_usuario, $imagen);
    	$this->estado = $estado;
		$this -> grado = $grado;
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
	public function getGrado() {
		return $this->grado;
	}
	
	/**
	 * @param mixed $grado 
	 * @return self
	 */
	public function setGrado($grado): self {
		$this->grado = $grado;
		return $this;
	}
}
