<?php
require 'ui/session/components/head.php';
require 'ui/session/includes/includes.php';
//manejo de errores
$errorAuth = false;

if (isset($_POST['autenticar'])) {
    $correo = $_POST['correo'];
    $clave = md5($_POST['clave']);

    $usuario = new Persona(null,null,null,$correo, $clave, null,null,null);
    $servUsuarios = ['AdminServicio', 'EstudianteServicio'];
    foreach($servUsuarios as $usuarioServ){
        if($usuarioServ::autenticar($usuario)){
            $errorAuth = false;
            $_SESSION["id"] = $usuario -> getIdPersona();
            if($usuarioServ == 'AdminServicio') header('Location: ?pid='. base64_encode('ui/profile/admin/index.php'));
            //if($usuarioServ == 'EstudianteServicio') header('Location: ?pid='. base64_encode('ui/profile/estudiante/index.php'));
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