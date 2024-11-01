<?php
require '../../../model/model_persona/Persona.php';
require '../../../model/model_persona/Profesor.php';
require '../../../model/model_persona/Estudiante.php';
require '../../../model/model_persona/Administrador.php';
require '../../../model/model_persona/User.php';
require '../../../model/Grado.php';

require '../../../Persistencia/Conexion.php';
require '../../../Persistencia/DAO.php';
require '../../../Persistencia/personaDAO/ProfesorDAO.php';
require '../../../Persistencia/personaDAO/EstudianteDAO.php';
require '../../../Persistencia/personaDAO/AdministradorDAO.php';
require '../../../Persistencia/personaDAO/UserDAO.php';
require '../../../Persistencia/GradoDAO.php';

require '../../../service/persona/adminServicio.php';
require '../../../service/persona/estudianteServicio.php';
require '../../../service/persona/profesorServicio.php';
require '../../../service/persona/UserServicio.php';
require '../../../service/persona/gradoServicio.php';

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
$rolParam = $_POST["rolParam"] ?? "";
$rol = $_POST["rol"] ?? "";
$grado = $_POST["grado"] ?? "";

$usuario_servicio = null;
$usuario = null;
$data = [];

switch ($rolParam) {
case '1':
    $usuario_servicio = new ProfesorServicio();
    $usuario = new Profesor($id_user, $nombre, $apellido, $correo, md5($clave), null, $fNac, $estado);
    break;
case '2':
    $usuario_servicio = new estudianteServicio();
    $usuario = new Estudiante($id_user, $nombre, $apellido, $correo, md5($clave), $grado, $estado, $fNac, null, $telefono);
    break;
case '3':
    $usuario_servicio = new AdminServicio();
    $usuario = new Administrador($id_user, $nombre, $apellido, $correo, md5($clave), null, $telefono, $fNac, $estado);
    break;
case '4':
    $usuario_servicio = new UserServicio();
    $usuario = new User($id_user, $nombre, $apellido, $correo, md5($clave),$telefono, $fNac, $rol, $grado, $estado);
    break;
}

function devolverTodos($user_serv) {
    
    $usuarios = $user_serv->consultarTodos();
    $data = array_map(function($obj) {
        $array_asc = [
            "idUsuario" => $obj->getIdPersona(),
            "nombre" => $obj->getNombre(),
            "apellido" => $obj->getApellido(),
            "correo" => $obj->getCorreo(),
            "clave" => $obj->getClave(),
            "fechaNac" => $obj->getFNac(),
            "estado" => $obj->getEstado(),
            "telefono" => $obj->getTelefono(),
            "grado" => "",
            "rol" => ""
        ];
        
        // Verifica si es instancia de Estudiante o User
        if ($obj instanceof Estudiante || ($obj instanceof User && $obj -> getRol() == 'estudiante') ) {
            $idGrado = $obj->getGrado();
            $objGrado = new Grado($idGrado);
            $gradoServ = new GradoServicio();
            $objGrado -> setNombre($gradoServ->consultar($idGrado));
 // Verifica que getGrado() no sea nulo
            $array_asc['grado'] = $objGrado-> getNombre();
        }
        // Agrega rol solo si es User
        if ($obj instanceof User) {
            $array_asc['rol'] = $obj->getRol();
        }
        
        return $array_asc;
    }, $usuarios);
    
    return $data;
}



switch ($action) {
    case '1':
        if($usuario_servicio -> insertar($usuario)) $data = devolverTodos($usuario_servicio);
        break;
    case '2':
        if($usuario_servicio -> eliminar($id_user)) $data = devolverTodos($usuario_servicio);
        break;
    case '3':
        if($usuario_servicio -> actualizar($usuario)) $data = devolverTodos($usuario_servicio);
        break;
    case '4':
        $data = devolverTodos($usuario_servicio);
        break;
    case '5':
        $usuario = $usuario_servicio->consultarPorId($id_user); // Ahora obtiene un objeto Profesor
        if ($usuario) {
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