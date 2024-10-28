<?php
class CodigoVerificacionDAO extends DAO{
    public function __construct(Conexion $conexion){
        parent::__construct($conexion);
    }
    
    public function cambiarEstado(CodigoVerificacion $codigo){
        $sql = "UPDATE `codigo_verificacion` SET `estado` = ?";
        $tipo = 's';
        $valor = $codigo -> getEstado();
        return ($this -> conexion -> prepararConsulta($sql, $tipo, $valor))? true : false;
    }
        /**
     * @inheritDoc
     */
    public function actualizar($objeto) {
    }
    
    /**
     * @inheritDoc
     */
    public function consultarPorId($id) {
    }
    
    /**
     * @inheritDoc
     */
    public function consultarTodos() {
    }
    
    /**
     * @inheritDoc
     */
    public function eliminar($id) {
    }
    
    /**
     * @inheritDoc
     */
    public function insertar($objeto) {
        $maxId = $this -> maxId()+1;
        $sql = "INSERT INTO `codigo_verificacion`(`idCodigo_verificacion`,`codigo`, `fecha_creado`, `fecha_expirado`, `estado`, `idUser`) VALUES (?,?,?,?,?,?)";
        $tipos = 'issssi';
        $valores = [
            $maxId,
            $objeto -> getIdCodigo(),
            $objeto -> getFecha_creado(),
            $objeto -> getFecha_expirado(),
            $objeto -> getEstado(),
            $objeto -> getUsuario() -> getIdPersona()
        ];
        return ($this -> conexion -> prepararConsulta($sql, $tipos, ...$valores))? true : false;
    }
    
    /**
     * @inheritDoc
     */
    public function maxId() {
        $sql = "SELECT MAX(idCodigo_verificacion) FROM codigo_verificacion;";
        $this -> conexion -> ejecutarConsulta($sql);
        $fila = $this -> conexion -> extraer();
        if($fila[0] == null){
            return 0;
        }
        return intval($fila[0]);
    }
}