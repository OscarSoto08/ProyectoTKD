<?php
require '../../../model/model_persona/Persona.php';
require '../../../model/model_persona/Profesor.php';

require '../../../Persistencia/Conexion.php';
require '../../../Persistencia/DAO.php';
require '../../../Persistencia/personaDAO/ProfesorDAO.php';
require '../../../service/persona/profesorServicio.php';

header('Content-Type: application/json');

$nombre = $_POST["nombre"] ?? "";
$apellido = $_POST["apellido"] ?? "";
$correo = $_POST["correo"] ?? "";
$fNac = $_POST["fechaNac"] ?? "";
$clave = isset($_POST["clave"]) ? md5($_POST["clave"]) : "";
$estado = isset($_POST["estado"]) ? $_POST["estado"] : "";
$telefono = $_POST["telefono"] ?? "";
$action = $_POST["action"] ?? "";
$id_user = $_POST["idUsuario"] ?? "";

function devolverTodos($profesorServicio){
    $profesores = $profesorServicio->consultarTodos();
    $data = array_map(function($obj){
    return [
        "idUsuario" => $obj -> getIdPersona(),
        "nombre" => $obj -> getNombre(),
        "apellido" => $obj -> getApellido(),
        "correo" => $obj -> getCorreo(),
        "clave" => $obj -> getClave(),
        "fechaNac" => $obj -> getFNac(),
        "estado" => $obj -> getestado(),
        "telefono" => $obj -> getTelefono()
        ];
    }, $profesores);
    return $data;
}


$profesorServicio = new ProfesorServicio();
$profesor = new Profesor($id_user, $nombre, $apellido, $correo, $clave, '', $telefono, $fNac, $estado);
$data = [];

switch ($action) {
    case '1':
        if($profesorServicio -> insertar($profesor)){
            $data = devolverTodos($profesorServicio);
        }
        break;
    case '2':
        if($profesorServicio -> eliminar($id_user)){
            $data = devolverTodos($profesorServicio);
        }
        break;
    case '3':
        if($profesorServicio -> actualizar($profesor)){
            $data = devolverTodos($profesorServicio);
            
        }
        break;
    case '4':
        $data = devolverTodos($profesorServicio);
        break;
    case '5':
        $profesor = $profesorServicio->consultarPorId($id_user); // Ahora obtiene un objeto Profesor
        if ($profesor) {
            $data = [
                "nombre" => $profesor->getNombre(),
                "apellido" => $profesor->getApellido(),
                "correo" => $profesor->getCorreo(),
                "clave" => $profesor->getClave(),
                "fechaNac" => $profesor->getFNac(),
                "estado" => $profesor->getEstado() == "activo"? 1 : 2,
                "telefono" => $profesor->getTelefono()
            ];
        }
        break;
}


echo json_encode($data);
?>