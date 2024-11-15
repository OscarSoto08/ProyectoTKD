<?php
class conexion{
    private $mysqlconexion;
    private $resultado;

    public function getResultado(){
        return $this->resultado;
    }

    public function getMysqlConexion(){
        return $this -> mysqlconexion;
    }

    public function iniciarConexion(){
        $this -> mysqlconexion = new mysqli("localhost", "root", "123456", "proyTKD");
       // $this -> mysqlconexion -> set_charset("utf-8");

        if($this -> mysqlconexion -> connect_error){
            die("Conexión fallida: ". $this -> mysqlconexion -> connect_error);
        }//else{
           // echo "Conectado Con exito";
        //}
    }

    // Método para preparar y ejecutar una consulta con parámetros
    public function prepararConsulta($consulta, $tipos, ...$valores) {
        if ($stmt = $this->mysqlconexion->prepare($consulta)) {
            // Asegúrate de que $tipos y $valores son válidos
            $stmt->bind_param($tipos, ...$valores);
    
            if ($stmt->execute()) {
                $this->resultado = $stmt->get_result();
                return true;
            } else {
                echo "Error al realizar la consulta: " . $stmt->error;
            }
            $stmt->close();
        } else {
            echo "Error en la preparación de la consulta: " . $this->mysqlconexion->error;
        }
        return false;
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
    public function extraerAssoc(){
        return $this -> resultado -> fetch_assoc();
    }

    public function obtenerKey(){
        return $this -> mysqlconexion -> insert_id;
    } 

    public function cerrarConexion(){
        $this -> mysqlconexion -> close();
    }
}
