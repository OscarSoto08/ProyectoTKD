<?php
require '../../../../model/model_persona/Persona.php';
require '../../../../model/model_persona/Profesor.php';
require '../../../../model/model_persona/Estudiante.php';
require '../../../../model/model_persona/Administrador.php';
require '../../../../model/model_persona/User.php';
require '../../../../model/Grado.php';

require '../../../../Persistencia/Conexion.php';
require '../../../../Persistencia/DAO.php';
require '../../../../Persistencia/personaDAO/ProfesorDAO.php';
require '../../../../Persistencia/personaDAO/EstudianteDAO.php';
require '../../../../Persistencia/personaDAO/AdministradorDAO.php';
require '../../../../Persistencia/personaDAO/UserDAO.php';
require '../../../../Persistencia/GradoDAO.php';

require '../../../../service/persona/adminServicio.php';
require '../../../../service/persona/estudianteServicio.php';
require '../../../../service/persona/profesorServicio.php';
require '../../../../service/persona/UserServicio.php';
require '../../../../service/gradoServicio.php';

header('Content-Type: application/json');

$rolParam = $_POST["rolParam"] ?? "";

$telefono = $_POST["telefono"] ?? "";
$action = $_POST["action"] ?? "";
$id_user = $_POST["idUsuario"] ?? "";
$rol = $_POST["rol"] ?? "";
$grado = $_POST["grado"] ?? "";

$nombre = $_POST["nombre"] ?? "";
$apellido = $_POST["apellido"] ?? "";
$correo = $_POST["correo"] ?? "";
$fNac = $_POST["fechaNac"] ?? "";
$clave = $_POST['clave'] ?? '';

if(strlen($clave) != 32) $clave = md5($clave);

$estado = $_POST['estado'] ?? '';



$usuario_servicio = null;
$usuario = null;
$data = [];

// $action = '5'; $rolParam = '2'; $id_user = '1';

switch ($rolParam) {
case '1':
    $usuario_servicio = new ProfesorServicio();
    $usuario = new Profesor($id_user, $nombre, $apellido, $correo, $clave, null,$telefono, $fNac, $estado);
    break;
case '2':
    $usuario_servicio = new estudianteServicio();
    $usuario = new Estudiante($id_user, $nombre, $apellido, $correo, $clave, $grado, $estado, $fNac, null, $telefono);
    break;
case '3':
    $usuario_servicio = new AdminServicio();
    $usuario = new Administrador($id_user, $nombre, $apellido, $correo, $clave, null, $telefono, $fNac, $estado);
    break;
case '4':
    $usuario_servicio = new UserServicio();
    $usuario = new User($id_user, $nombre, $apellido, $correo, $clave,$fNac, $estado, $telefono, $rol, $grado);
    
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
            $gradoServ = new GradoServicio();
            $obj -> setGrado($gradoServ -> consultar($obj->getGrado()));
            $array_asc['grado'] = $obj -> getGrado() -> getNombre();
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
        $usuario = $usuario_servicio -> consultarPorId($id_user); 
        $rol = ''; $grado = '';
        
        if($rolParam == '4') $rol = $usuario -> getRol(); 
        if($rolParam == '4' || $rolParam == '2'){
            $grado = $usuario -> getGrado(); // Se obtiene el id para que el select del formulario lo pueda asociar
        } 

        $data = [
            "nombre" => $usuario->getNombre(),
            "apellido" => $usuario->getApellido(),
            "correo" => $usuario->getCorreo(),
            "clave" => $usuario->getClave(),
            "fechaNac" => $usuario->getFNac(),
            "estado" => $usuario->getEstado(),
            "telefono" => $usuario->getTelefono(),
            "rol" => $rol,
            "grado" => $grado
        ];
        break;
}


echo json_encode($data);
