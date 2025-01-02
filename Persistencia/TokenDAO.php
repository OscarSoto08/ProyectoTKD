<?php
class TokenDAO extends DAO{
    public function __construct(Conexion $conexion){
        parent::__construct($conexion);
    }
    
    public function cambiarEstado(Token $codigo){
        $sql = "UPDATE `codigo_verificacion` SET `estado` = ? WHERE idCodigo_verificacion = ?";
        $tipo = 'si';
        $valores = [ $codigo -> getEstado(), $codigo -> getId()];
        return $this -> conexion -> prepararConsulta($sql, $tipo, ...$valores);
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
        $sql = "INSERT INTO `Token`(`idToken`,`codigo`, `motivo`, `fecha_creado`, `fecha_expirado`, `estado`, `idUsuario`) VALUES (?,?,?,?,?,?,?)";
        $tipos = 'isssssi';
        $valores = [
            $this -> maxId() +1,
            $objeto -> getCodigo(),
            $objeto -> getMotivo(),
            $objeto -> getFecha_creado(),
            $objeto -> getFecha_expirado(),
            $objeto -> getEstado(),
            $objeto -> getUsuario() -> getIdUsuario()
        ];
        return $this -> conexion -> prepararConsulta($sql, $tipos, ...$valores);
    }
    
    /**
     * @inheritDoc
     */
    public function maxId() {
        $sql = "SELECT MAX(idToken) FROM Token;";
        $this -> conexion -> ejecutarConsulta($sql);
        $fila = $this -> conexion -> extraer();
        if($fila[0] == null){
            return 0;
        }
        return intval($fila[0]);
    }
}