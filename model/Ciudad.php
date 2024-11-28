<?php
/**
 * Summary of Ciudad
 */
class Ciudad{
    private $id;
    private $nombre;
    private $pais;

    /**
     * @param mixed $id
     * @param mixed $nombre
     * @param mixed $pais
     */
    public function __construct($id, $nombre, $pais) {
    	$this->id = $id;
    	$this->nombre = $nombre;
    	$this->pais = $pais;
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
	public function getPais() {
		return $this->pais;
	}
	
	/**
	 * @param mixed $pais 
	 * @return self
	 */
	public function setPais($pais): self {
		$this->pais = $pais;
		return $this;
	}
}