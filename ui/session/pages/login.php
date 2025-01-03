<?php
ob_start();
require 'ui/session/components/head.php';
require 'ui/session/includes.php';

$error = "";
$userDoesNotExist = false;

if (isset($_SESSION['id']) && isset($_SESSION['tipoUsuario'])) {
    switch ($_SESSION['tipoUsuario']) {
        case 'administrador':
            header('Location: ?pid='.base64_encode('ui/administrador/index.php'));
            exit();
        case 'estudiante':
            header('Location: ?pid='.base64_encode('ui/estudiante/index.php'));
            exit();
        case 'profesor':
            header('Location: ?pid='.base64_encode('ui/profesor/index.php'));
            exit();
    }
}

if (isset($_POST['autenticar'])) {
    $correo = $_POST['correo'];
    $clave = md5($_POST['clave']);

    $usuario = new Usuario(correo: $correo, clave: $clave);

    if (!Usuario::verificar($usuario)) {
        $error = "El usuario no existe, regístrate.";
        $userDoesNotExist = true;
    } elseif ($usuario->autenticar() && !$userDoesNotExist) {
        $_SESSION["id"] = $usuario->getIdUsuario();
        $_SESSION["tipoUsuario"] = match ($usuario->getTipoUsuario()) {
            1 => 'administrador',
            2 => 'estudiante',
            3 => 'profesor',
            default => 'desconocido'
        };

        $estado = $usuario->getEstado();
        if ($estado === 'permitido') {
            switch ($_SESSION['tipoUsuario']) {
                case 'administrador':
                    header('Location: ?pid='.base64_encode('ui/administrador/index.php'));
                    exit();
                case 'estudiante':
                    header('Location: ?pid='.base64_encode('ui/estudiante/index.php'));
                    exit();
                case 'profesor':
                    header('Location: ?pid='.base64_encode('ui/profesor/index.php'));
                    exit();
            }
        } elseif ($estado === 'pendiente') {
            header('Location: ?pid='.base64_encode('ui/session/pages/login.php').'&status=1');
        } else {
            header('Location: ?pid='.base64_encode('ui/session/pages/login.php').'&status=3');
        }
    } else {
        $error = "Credenciales incorrectas.";
    }
}
?>

<body>
    <section class="container">
        <?php include 'ui/session/components/login_container.php'; ?>
    </section>
</body>
</html>
