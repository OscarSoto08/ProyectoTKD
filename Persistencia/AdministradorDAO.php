<?
require('DAO.php');
class AdministradorDAO extends DAO{
    function auntenticar($correo, $clave){
        $sql = "select idAdministrador, nombre, apellido, foto, correo, clave, foto, telefono, celular, estado
                from Administrador
                where correo = ? and clave = ?";
        //Preparo el esqueleto, le solicito al motor que haga analice mi select y haga un esqueleto
        
        //La ventaja de usar esto, es que fuera de que es facil es mas seguro que con la concatenacion directa
        $stmt = $this -> conexion -> prepare($sql);
        if($stmt === false){
            return false;
        }
        $hashedKey = md5($clave);
        //Aca se ligan los valores correo y hashedKey aunque md5 no se recomienda usarlo
        $stmt -> bind_param('ss', $correo, $hashedKey);
        $stmt -> execute();  
        $resultado = $stmt -> get_result() ;
        
        return ($resultado -> num_rows > 0) ? $resultado -> fetch_assoc() : false;
    }
    public function consultarTodos(){
        
    }
    public function consultarPorId($id){}
    public function insertar($objeto){}
    public function actualizar($objeto){}
    public function eliminar($objeto){}
}
