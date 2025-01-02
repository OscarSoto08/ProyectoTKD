<?php
require 'ui/session/components/head.php';
require 'ui/session/includes.php';
//manejo de errores
$errorAuth = false;

if(isset($_SESSION['id']) && isset($_SESSION['tipoUsuario'])){ //Verificar que el usuario ya existe y que usuario es para redirigirlo a su index
    if($_SESSION['tipoUsuario'] == 'administrador') header('Location: ?pid='. base64_encode('ui/administrador/index.php'));
    if($_SESSION['tipoUsuario'] == 'estudiante') header('Location: ?pid='. base64_encode('ui/estudiante/index.php'));
    if($_SESSION['tipoUsuario'] == 'profesor') header('Location: ?pid='. base64_encode('ui/profesor/index.php'));
}

if (isset($_POST['autenticar'])) {
$correo = $_POST['correo'];
$clave = md5($_POST['clave']);

$usuario = new Persona(null,null,null,$correo, $clave, null,null,null, null, null);
$servUsuarios = ['Administrador', 'Estudiante', 'Profesor'];
foreach($servUsuarios as $usuarioServ){
    if($usuarioServ::autenticar($usuario)){
        $errorAuth = false;
        $_SESSION["id"] = $usuario -> getIdUsuario();
        if($usuarioServ == 'Administrador'){  
            $_SESSION['tipoUsuario'] = 'administrador';
            header('Location: ?pid='. base64_encode('ui/administrador/index.php'));
        }
        if($usuarioServ == 'Estudiante'){
            $_SESSION['tipoUsuario'] = 'estudiante';
            header('Location: ?pid='. base64_encode('ui/estudiante/index.php'));
        } 
        if($usuarioServ == 'Profesor'){
            $_SESSION['tipoUsuario'] = 'profesor';
            header('Location: ?pid='. base64_encode('ui/profesor/index.php'));
        } 
        if($usuarioServ == 'Usuario'){
            $status = 0;
            switch ($usuario -> getEstado()) {
                case 'pendiente':
                    $status = 1;
                    header("Location: ?pid=".base64_encode('ui/session/pages/login.php')."&status=". $status);
                    exit();
                case 'permitido':
                    $status = 2;
                    header("Location: ?pid=".base64_encode('ui/session/pages/login.php')."&status=". $status);
                    exit();
                case 'denegado': 
                    $status = 3;
                    header("Location: ?pid=".base64_encode('ui/session/pages/login.php')."&status=". $status);
                    exit();
                default:
                    $status = 0;
                    break;
            }
        }
    }else{
        $errorAuth = true;
    }
}
}
?>

<body>
    <section class="container">
        <?php include 'ui/session/components/login_container.php' ?>
    </section>
</body>
</html>