<nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="?pid=<?php echo base64_encode("ui/administrador/index.php"); ?>">
            <i class="fas fa-fist-raised"></i> Club Taekwondo
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="?pid=<?php echo base64_encode("ui/administrador/index.php"); ?>"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?pid=<?php echo base64_encode("ui/administrador/pages/estudiantes.php"); ?>"><i class="fas fa-users"></i> Estudiantes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?pid=<?php echo base64_encode("ui/administrador/pages/profesores.php"); ?>"><i class="fas fa-chalkboard-teacher"></i> Profesores</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?pid=<?php echo base64_encode("ui/administrador/pages/eventos.php"); ?>"><i class="fas fa-calendar-alt"></i> Eventos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?pid=<?php echo base64_encode("ui/administrador/pages/cursos.php"); ?>"><i class="fas fa-list"></i> Cursos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?pid=<?php echo base64_encode("ui/administrador/pages/preguntas.php"); ?>"><i class="fas fa-question-circle"></i> Preguntas</a>
                </li>
            </ul>
        </div>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="?cs=<?php echo base64_encode("true"); ?>"><i class="fa-solid fa-arrow-right-from-bracket"></i> Cerrar sesion</a>
                </li>
            </ul>
        </div>
    </div>
</nav>