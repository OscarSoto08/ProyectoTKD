<?php
class Profesor extends Usuario {
    private $estado;
    /**
     * @param mixed $estado
     */
    public function __construct($idPersona='', $nombre='', $apellido='', $correo='', $clave='', $estado_registro='', $fecha_nacimiento='', $telefono='', $tipo_usuario = '', $estado='', $imagen=null){
        parent::__construct($idPersona, $nombre, $apellido, $correo, $clave, $estado_registro, $fecha_nacimiento, $telefono, $tipo_usuario, $imagen);
    	$this->estado = $estado;
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
}
?>