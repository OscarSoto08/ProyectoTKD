
<?php
//? 1: Consultar por id
//? 2: Editar
//? 3: Eliminar
//? 4: Crear

$id = $_POST["id"];
$action = $_POST["action"];
$tipo_usuario = $_POST["tipo_usuario"];

switch ($action) {
    case '1':
        $data = $tipo_usuario::consultarPorId($id);
        break;
    default:
        # code...
        break;
}

echo json_encode($data);