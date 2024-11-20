<?php 
session_start();

if(isset($_GET['cs']) && base64_decode($_GET['cs']) == 'true') session_destroy();



$paginasSinSesion = [
    'ui/home/pages/brief-info.php',
    'ui/home/pages/events.php',
    'ui/home/pages/history.php',
    'ui/home/pages/tree.php',
    'ui/session/pages/login.php',
    'ui/session/pages/signup.php',
    'ui/session/pages/success.php',
    'ui/session/pages/verify_code.php'
];
$paginasConSesion = [
    'ui/profile/admin/index.php',
    'ui/profile/admin/pages/manage_users.php',
    'ui/profile/admin/pages/manage_events.php',
    'ui/profile/admin/pages/manage_courses.php',
    'ui/profile/admin/pages/course.php',
    'ui/profile/student/index.php',
    'ui/profile/student/pages/subcurso.php',
    'ui/profile/teacher/index.php'
];

if(empty($_GET['pid'])){
    include 'ui/home/components/head.php';
    include 'ui/home/components/navbar.php';
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
