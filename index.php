<?php 
session_start();

if(isset($_GET['cs']) && base64_decode($_GET['cs']) == 'true') session_destroy();


$filesForComponents = glob('ui/components/*php'); //la flag GLOB_BRACE permite usar ** que significa que busca en las subcarpetas tambien
foreach ($filesForComponents as $file) {
    include $file;
}

$paginasSinSesion = glob('ui/session/pages/*.php');

$paginasConSesion = [
    'ui/administrador/index.php',
    'ui/administrador/pages/estudiantes.php',
    'ui/administrador/pages/profesores.php',
    'ui/administrador/pages/eventos.php',
    'ui/administrador/pages/cursos.php',
    'ui/administrador/pages/preguntas.php',
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
    new Navitem(posicion: 'derecha', contenido: ['CONTACTO']),
    new Navitem(posicion:'derecha', contenido: ['INGRESAR'], getParams:[
        "pid" => base64_encode("ui/session/pages/login.php")
        ])
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
