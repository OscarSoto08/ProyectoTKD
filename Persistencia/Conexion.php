<?php
class conexion{
    private $mysqlconexion;
    private $resultado;

    public function iniciarConexion(){
        $this -> mysqlconexion = new mysqli("localhost", "root", "", "proyecto_tkd");
        $this -> mysqlconexion -> set_charset("utf-8");

        if($this -> mysqlconexion -> connect_error){
            die("Conexión fallida: ". $this -> mysqlconexion -> connect_error);
        }
    }

    public function ejecutarConsulta($query){
        $this -> resultado = $this -> mysqlconexion -> query($query); 
    }

    public function numFilas(){
        return ($this ->  resultado != null) ? $this -> resultado -> num_rows : 0;  
    }

    public function extraer(){
        return $this -> resultado -> fetch_row();
    }

    public function preparar($sql){
        return $this -> mysqlconexion -> prepare($sql);
    }

    public function obtenerKey(){
        return $this -> mysqlconexion -> insert_id;
    } 

    public function cerrarConexion(){
        $this -> mysqlconexion -> close();
    }
}

?>