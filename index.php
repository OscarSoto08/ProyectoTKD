<?php 
session_start();

if(isset($_GET['cs']) && base64_decode($_GET['cs']) == 'true') session_destroy();



$paginasSinSesion = [
    'ui/session/pages/login.php',
    'ui/session/pages/signup.php',
    'ui/session/pages/success.php',
    'ui/session/pages/verify_code.php'
];
$paginasConSesion = [
    'ui/administrador/index.php',
    'ui/administrador/pages/manage_users.php',
    'ui/administrador/pages/manage_events.php',
    'ui/administrador/pages/manage_courses.php',
    'ui/administrador/pages/course.php',
    'ui/estudiante/index.php',
    'ui/estudiante/pages/subcurso.php',
    'ui/profesor/index.php'
];

if(empty($_GET['pid'])){
    include 'ui/inicio/components/head.php';
    include 'ui/inicio/components/navbar.php';
    ?>
    <body>
    <div id="datos">
        <div class="row mb-10 container mx-auto">
            <div class="col container">

                <div class="card border-dark p-8" id="content">
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<?php
}else{
    $pid = base64_decode($_GET['pid']);
    // echo $pid;
    if(in_array($pid, $paginasSinSesion)){
        include $pid; 
    }else if(in_array($pid, $paginasConSesion)){
        if(isset($_SESSION["id"])){
            include $pid;
        }else{
            include 'ui/session/pages/login.php';
        }
    }else{
        include 'ui/error404.php';
    }
}
?>
