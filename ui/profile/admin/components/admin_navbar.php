<?php 
$ruta = explode("/",base64_decode($_GET['pid'])); 
//  foreach ($ruta as $key){ echo "<h1>$key</h1>";}
$script_actual = $ruta[count($ruta)-1];
?>

<nav class="mb-5 navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand  mx-3" href="?pid=<?php echo base64_encode('ui/profile/admin/index.php')?>">
      <img src="img/image.png" alt="" style="width: 40px; height: 40px;" srcset="">
      <?php echo $administrador -> getNombre(). ' '. $administrador -> getApellido(); ?>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0" id="opciones-navbar">
        <li class="nav-item">
        <a class="nav-link <?php echo ($script_actual == 'index.php') ? 'active'  : ''; ?>" aria-current="page" href="?pid=<?php echo base64_encode('ui/profile/admin/index.php') ?>">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo ($script_actual == 'manage_events.php') ? 'active'  : ''; ?>" href="?pid=<?php echo base64_encode('ui/profile/admin/pages/manage_events.php')?>">Gestionar eventos</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle <?php echo ($script_actual == 'manage_users.php') ? 'active' : ''?>" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
           <?php 
           if(isset($_GET["rol"])){
            switch ($_GET["rol"]) {
              case '1':
                echo 'Profesores';
                break;
              case '2':
                echo 'Estudiantes';
                break;
              case '3':
                echo 'Administradores';
                break;
              case '4':
                echo 'Usuarios temporales';
            }
           }else{
            echo 'Gestionar usuarios';
           }
           ?>
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="?pid=<?php echo base64_encode('ui/profile/admin/pages/manage_users.php')?>&rol=1">Profesores</a></li>
            <li><a class="dropdown-item" href="?pid=<?php echo base64_encode('ui/profile/admin/pages/manage_users.php')?>&rol=2">Estudiantes</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="?pid=<?php echo base64_encode('ui/profile/admin/pages/manage_users.php')?>&rol=3">Administradores</a></li>
            <li><a class="dropdown-item" href="?pid=<?php echo base64_encode('ui/profile/admin/pages/manage_users.php')?>&rol=4">Usuarios temporales</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Gestionar cursos</a>
        </li>
        
      </ul>
      <ul class="right navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item">
          <a class="nav-link" href="#">Reportes</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Auditorias</a>
        </li>
        <li class="nav-item dropdown" id="perfil-dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Mi perfil: Administrador
          </a>
          
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Configuración</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="?cs=<?php echo base64_encode('true');?>">Cerrar sesión</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>