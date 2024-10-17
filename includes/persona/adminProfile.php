<?php require '../head/header.php'; ?>
<link rel="stylesheet" href="../../css/profile.css">
</head> 
<body>
<?php 
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit; // Asegúrate de salir después de redirigir
}

$id = $_SESSION["id"];
require '../../logica/Persona.php';
require '../../logica/Administrador.php';
require '../../servicios/adminServicio.php';

$administrador = new Administrador($id);
$adminService = new AdminServicio();
$adminService->consultarPorId($administrador);
?>

<div class="container-fluid">
    <div class="row">
      
        <!-- Sidebar -->
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-dark text-white sidebar collapse">
            <div class="position-sticky">
                <h2 class="text-center py-3">Panel de control</h2>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active text-white" href="#dashboard-home">Tablero</a>
                    </li><li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Gestionar Usuarios
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="userDropdown">
                            <li><a href="#" class="dropdown-item">Administradores</a></li>
                            <li><a href="#" class="dropdown-item">Profesores</a></li>
                            <li><a href="#" class="dropdown-item">Estudiantes</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#event-management">Gestionar Eventos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#course-management">Gestionar Cursos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#reports">Reportes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#settings">Configuración</a>
                    </li>
                </ul>
            </div>
        </nav>
      
        <!-- Main content -->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Bienvenido, <?php echo htmlspecialchars($administrador->getNombre()) . " " . htmlspecialchars($administrador->getApellido()); ?> !!</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group me-2">
                        <button class="btn btn-sm btn-outline-secondary">Notificaciones</button>
                        <button class="btn btn-sm btn-outline-secondary">Configuraciones</button>
                        <a class="btn btn-sm btn-danger" href="../../index.php?cerrarSesion=true">Cerrar Sesion</a>
                    </div>
                </div>
            </div>

            <!-- User Management Section -->
            <section id="user-management" class="mb-5">
                <h2>Gestión de usuarios</h2>
                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Rol</th>
                                <th>Estado</th>
                                <th>Cinturon</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Deisy Soto</td>
                                <td>Estudiante</td>
                                <td>Activo</td>
                                <td>Rojo</td>
                                <td class="text-center">
                                    <button class="btn btn-sm btn-primary">Editar</button>
                                </td>
                            </tr>
                            <!-- Repeat for each user -->
                        </tbody>
                    </table>
                </div>
            </section>

            <!-- Event Management Section -->
            <section id="event-management" class="mb-5">
                <h2>Manejo de eventos</h2>
                <button class="btn btn-success mb-3">Crear nuevo evento</button>
                <!-- Event calendar or list -->
            </section>

            <!-- Course Management Section -->
            <section id="course-management" class="mb-5">
                <h2>Manejo de cursos</h2>
                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Curso 1
                        <button class="btn btn-sm btn-warning">Edit</button>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Curso 2
                        <button class="btn btn-sm btn-warning">Edit</button>
                    </li>
                    <!-- Repeat for each course -->
                </ul>
            </section>
        </main>
    </div>
</div>


</body>
</html>
