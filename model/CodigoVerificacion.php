<?php 
class CodigoVerificacion{
    private $idCodigo;
    private $fecha_creado;
    private $fecha_expirado;
    private $estado;
    private $usuario;

    public function __construct($idCodigo = null, $fecha_creado = null, $fecha_expirado = null, $estado = null, $usuario = null){
        $this->idCodigo = $idCodigo;
        $this->fecha_creado = $fecha_creado;
        $this->fecha_expirado = $fecha_expirado;
        $this->estado = $estado;
        $this->usuario = $usuario;
    }

    public function getIdCodigo(){ return $this->idCodigo; }
    public function getFecha_creado(){ return $this->fecha_creado; }
    public function getFecha_expirado(){ return $this->fecha_expirado; }
    public function getEstado(){ return $this->estado; }
    public function getUsuario(){ return $this->usuario; }


    //Los setters los coloco si son necesarios
    public function setIdCodigo($idCodigo) { $this->idCodigo = $idCodigo; }
    public function setFecha_creado($fecha_creado) { $this->fecha_creado = $fecha_creado; }
    public function setFecha_expirado($fecha_expirado) { $this->fecha_expirado = $fecha_expirado;}
    public function setEstado($estado) { $this->estado = $estado; }
    public function setUsuario($usuario) { $this->usuario = $usuario; }
}
