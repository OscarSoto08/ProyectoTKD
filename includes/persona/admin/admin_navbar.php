<?php 
$ruta = explode("/",$_SERVER["SCRIPT_NAME"]); 
//  foreach ($ruta as $key){ echo "<h1>$key</h1>";}
$script_actual = $ruta[count($ruta)-1];
?>

<nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><?php echo $administrador -> getNombre(). ' '. $administrador -> getApellido(); ?></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
        <a class="nav-link <?php echo ($script_actual == 'index.php') ? 'active'  : ''; ?>" aria-current="page" href="../admin">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Gestionar eventos</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle <?php echo ($script_actual == 'gestion_profesores.php') ? 'active' : ''?>" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
           <?php 
           switch ($script_actual) {
            case 'index.php':
                echo 'Gestionar usuarios';
                break;
            
            case 'gestion_profesores.php':
                echo 'Profesores';
                break;
           }
           ?>
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="gestion_profesores.php">Profesores</a></li>
            <li><a class="dropdown-item" href="#">Estudiantes</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Administradores</a></li>
            <li><a class="dropdown-item" href="#">Usuarios temporales</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Gestionar </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Mi perfil
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Configuración</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="../../../?cerrarsesion=true">Cerrar sesión</a></li>
          </ul>
        </li>
      </ul>
      
    </div>
  </div>
</nav>