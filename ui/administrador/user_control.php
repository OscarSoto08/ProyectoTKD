
<?php
//? 1: Consultar por id
//? 2: Consultar por filtro
//? 3: Consultar todos
//? 4: Editar
//? 5: Eliminar
//? 6: Crear

$id = $_POST["id"] ?? '';
$action = $_POST["action"];
$tipo_usuario = $_POST["tipo_usuario"] ?? '';

$nombre = $_POST['nombre'] ??'';
$apellido = $_POST['apellido'] ??'';
$correo = $_POST['correo'] ??'';
$estado = $_POST['estado'] ??'';
$fecha_nacimiento = $_POST['fecha_nacimiento'] ??'';
$telefono = $_POST['telefono'] ??'';

switch ($action) {
    case '1':
        $data = $tipo_usuario::consultarPorId($id);
        break;
    case '2':
        $data = Usuario::filtrar_tipo_usuario($tipo_usuario);
        break;
    case '3':
        $data = Usuario::consultarTodos();
        break;
    case '4':
        $usuario = new Usuario(
            $id,
            $nombre,
            $apellido,
            $correo,
            "",
            $estado,
            $fecha_nacimiento,
            $telefono,
            "",
            ""
            
        );
        $data = (Usuario::actualizar($usuario))? "success": "error"; //ciudado con actualizar la clave
        break;
    default:
        $data = null;
        break;
}

echo json_encode($data);