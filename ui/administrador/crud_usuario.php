<?php
require '../../business/Persona.php';
require '../../business/Profesor.php';
require '../../business/Estudiante.php';
require '../../business/Administrador.php';
require '../../business/Usuario.php';
require '../../business/Grado.php';

require '../../Persistencia/Conexion.php';
require '../../Persistencia/DAO.php';
require '../../Persistencia/ProfesorDAO.php';
require '../../Persistencia/EstudianteDAO.php';
require '../../Persistencia/AdministradorDAO.php';
require '../../Persistencia/UsuarioDAO.php';
require '../../Persistencia/GradoDAO.php';

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



$usuario_servicio = '';
$usuario = null;
$data = null;

// $action = '5'; $rolParam = '2'; $id_user = '1';

switch ($rolParam) {
case '1':
    $usuario_servicio = 'Profesor';
    $usuario = new Profesor($id_user, $nombre, $apellido, $correo, $clave, null,$telefono, $fNac, $estado);
    break;
case '2':
    $usuario_servicio = 'Estudiante';
    $usuario = new Estudiante($id_user, $nombre, $apellido, $correo, $clave, $grado, $estado, $fNac, null, $telefono);
    break;
case '3':
    $usuario_servicio = 'Administrador';
    $usuario = new Administrador($id_user, $nombre, $apellido, $correo, $clave, null, $telefono, $fNac, $estado);
    break;
case '4':
    $usuario_servicio = 'Usuario';
    $usuario = new Usuario($id_user, $nombre, $apellido, $correo, $clave,$fNac, $estado, $telefono, $rol, $grado);
    break;
}

function devolverTodos($user_serv) {
    
    $usuarios = $user_serv::consultarTodos();
    $data = array_map(function($obj) {
        
        $array_asc = [
            "idUsuario" => $obj->getIdUsuario(),
            "nombre" => $obj->getNombre(),
            "apellido" => $obj->getApellido(),
            "correo" => $obj->getCorreo(),
            "clave" => $obj->getClave(),
            "fechaNac" => $obj->getFechaNacimiento(),
            "estado" => $obj->getEstado(),
            "telefono" => $obj->getTelefono(),
            "grado" => ($obj instanceof Estudiante) ? $obj -> getGrado() -> getNombre() : "",
        ];
        
        return $array_asc;
    }, $usuarios);
    
    return $data;
}


switch ($action) {
    case '1':
        if($usuario_servicio::insertar($usuario)) $data = devolverTodos($usuario_servicio);
        break;
    case '2':
        if($usuario_servicio::eliminar($id_user)) $data = devolverTodos($usuario_servicio);
        break;
    case '3':   
        if($usuario_servicio::actualizar($usuario)) $data = devolverTodos($usuario_servicio);
        break;
    case '4':
        $data = devolverTodos($usuario_servicio);
        break;
    case '5':
        $usuario = $usuario_servicio::consultarPorId($id_user); 
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


echo json_encode($data,JSON_UNESCAPED_UNICODE);
