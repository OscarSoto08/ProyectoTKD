<?php require '../../head/header.php'; ?>
<link rel="stylesheet" href="../../../css/profile.css">
</head> 
<body>
<?php 
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: ../../login");
    exit; // Asegúrate de salir después de redirigir
}

$id = $_SESSION["id"];
require '../../../Persistencia/Conexion.php';
require '../../../Persistencia/AdministradorDAO.php';
require '../../../model/Persona.php';
require '../../../model/Administrador.php';
require '../../../service/persona/adminServicio.php';

$administrador = new Administrador($id);
$adminService = new AdminServicio();
$adminService->consultarPorId($administrador);
?>

<div class="container-fluid">
    <div class="row">
      
        <?php require 'sidebar.php'; ?>
      
        <!-- Main content -->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Bienvenido, <?php echo htmlspecialchars($administrador->getNombre()) . " " . htmlspecialchars($administrador->getApellido()); ?> !!</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group me-2">
                        <button class="btn btn-sm btn-outline-secondary">Notificaciones</button>
                        <button class="btn btn-sm btn-outline-secondary">Configuraciones</button>
                        <a class="btn btn-sm btn-danger" href="../../../?cerrarSesion=true">Cerrar Sesion</a>
                    </div>
                </div>
            </div>

            <?php require 'manejoUsuarios.php'; ?>
            
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
