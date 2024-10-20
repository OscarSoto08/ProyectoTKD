<?php
class estudianteServicio{
    private $EstDAO;
    public function __construct(){
        $conexion = new Conexion();
        $this->EstDAO = new EstudianteDAO($conexion);
    }
}
?>