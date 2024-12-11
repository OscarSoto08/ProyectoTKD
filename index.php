<?php 
session_start();

if(isset($_GET['cs']) && base64_decode($_GET['cs']) == 'true') session_destroy();
include 'ui/components/Header.php';
include 'ui/components/Navbar.php';
include 'ui/components/Navitem.php';

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

$header = new Header(css:['css/styleAG.css', 'css/style.css', 'css/events.css'], js: ['js/script.js', 'js/events.js', 'js/main.js']);
$header->render(); 
$navbar = new Navbar(nav_items: [
    new Navitem(posicion: 'izquierda', contenido: ['INICIO'], atributos: ["data-page='ui/inicio/pages/brief-info.php'"]),
    new Navitem(posicion: 'izquierda', contenido: ['EVENTOS'],atributos: ["data-page='ui/inicio/pages/events.php'"]),
    new Navitem(posicion: 'centro', contenido: ['HISTORIA'], atributos: ["data-page='ui/inicio/pages/history.php'"]),
    new Navitem(posicion: 'centro', contenido: ['QUIENES SOMOS'], atributos: ["data-page='ui/inicio/pages/tree.php'"]),
    new Navitem(posicion: 'derecha', contenido: ['CONTACTO'], link: ''),
    new Navitem(posicion:'derecha', contenido: ['INGRESAR'], link: 'ui/session/pages/login.php')
]);
$navbar -> render();
?>
<div id="datos">
    <div class="row mb-10 mx-auto">
        <div class="col-1"></div>
        <div class="col-10">
            <div class="card border-dark p-8" id="content">
            </div>
        </div>
    </div>
</div>
<?php
$header->close();
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
