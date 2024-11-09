<?php
require 'ui/session/components/head.php';
require 'ui/session/includes/includes.php';
//manejo de errores
$errorAuth = false;

if(isset($_SESSION['id']) && isset($_SESSION['tipoUsuario'])){
    if($_SESSION['tipoUsuario'] == 'administrador') header('Location: ?pid='. base64_encode('ui/profile/admin/index.php'));
    if($_SESSION['tipoUsuario'] == 'estudiante') header('Location: ?pid='. base64_encode('ui/profile/student/index.php'));
    if($_SESSION['tipoUsuario'] == 'profesor') header('Location: ?pid='. base64_encode('ui/profile/teacher/index.php'));
}
if (isset($_POST['autenticar'])) {
    $correo = $_POST['correo'];
    $clave = md5($_POST['clave']);

    $usuario = new Persona(null,null,null,$correo, $clave, null,null,null);
    $servUsuarios = ['AdminServicio', 'EstudianteServicio', 'ProfesorServicio'];
    foreach($servUsuarios as $usuarioServ){
        if($usuarioServ::autenticar($usuario)){
            $errorAuth = false;
            $_SESSION["id"] = $usuario -> getIdPersona();
            if($usuarioServ == 'AdminServicio'){  
                $_SESSION['tipoUsuario'] = 'administrador';
                header('Location: ?pid='. base64_encode('ui/profile/admin/index.php'));
            }
            if($usuarioServ == 'EstudianteServicio'){
                $_SESSION['tipoUsuario'] = 'estudiante';
                header('Location: ?pid='. base64_encode('ui/profile/student/index.php'));
            } 
            if($usuarioServ == 'ProfesorServicio'){
                $_SESSION['tipoUsuario'] = 'profesor';
                header('Location: ?pid='. base64_encode('ui/profile/teacher/index.php'));
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