<?php
class CodigoVerificacionServicio{
    private $codigoDAO;

    public function __construct(){
        $this ->codigoDAO = new CodigoVerificacionDAO();
    }

    public function generarCodigo($longitud){
        return substr(bin2hex(random_bytes($longitud)), 0, $longitud);
    }
}
?>