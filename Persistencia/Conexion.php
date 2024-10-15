<?php
class conexion{
    private $mysqlconexion;
    private $resultado;

    public function getResultado(){
        return $this->resultado;
    }

    public function iniciarConexion(){
        $this -> mysqlconexion = new mysqli("localhost", "root", "", "proyecto_tkd");
       // $this -> mysqlconexion -> set_charset("utf-8");

        if($this -> mysqlconexion -> connect_error){
            die("Conexión fallida: ". $this -> mysqlconexion -> connect_error);
        }//else{
           // echo "Conectado Con exito";
        //}
    }

    // Método para preparar y ejecutar una consulta con parámetros
    public function prepararConsulta($consulta, $tipos, $valores) {
        // Preparar la consulta
        if ($stmt = $this->mysqlconexion->prepare(query: $consulta)){
            $stmt -> bind_param($tipos, ...$valores);

            if($stmt -> execute()){
                $this -> resultado = $stmt -> get_result();
            }else{
                echo "Error al realizar la consulta: ". $stmt -> error;
            }
            $stmt -> close();
        } else {
            echo "Error en la preparación de la consulta: " . $this->mysqlconexion->error;
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

    public function obtenerKey(){
        return $this -> mysqlconexion -> insert_id;
    } 

    public function cerrarConexion(){
        $this -> mysqlconexion -> close();
    }
}

?>