<?php ?>
<nav class="navbar navbar-dark bg-dark fixed-top">
    <div class="container-fluid d-flex justify-content-between">
        <a class="navbar-brand" href="index.php">
            <img src="img/image.png" alt="Logo de Kopulso">
        </a>
        <a class="navbar-brand" href="index.php">LTA (Learning Taekwondo Application)</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Club de Taekwondo KOPULSO</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            
            <div class="offcanvas-body d-flex flex-column justify-content-between">
                <ul class="navbar-nav flex-grow-1 pe-3">
                    <li class="nav-item dropdown">
                        <a class="nav-link active dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Inicio
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark">
                            <li><a class="dropdown-item" data-page="ui/inicio/pages/brief-info.php">Información General</a></li>
                            <li><a class="dropdown-item" data-page="ui/inicio/pages/history.php">Historia</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" data-page="ui/inicio/pages/tree.php">Árbol Genealógico</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?pid=<?php echo base64_encode('ui/session/pages/login.php');?>" data-page="ui/session/pages/login.php">Autenticarse</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="ui/inicio/pages/events.php" data-page="ui/home/pages/events.php">Eventos</a>
                    </li>
                </ul>
                <!-- Redes sociales -->
                <ul class="d-flex mt-5 justify-content-evenly" id="redes">
                    <li class="nav-item">
                        <a href="#" class="nav-link" aria-label="WhatsApp">
                            <img src="img/wpp-icon.png" alt="Logo de WhatsApp">
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link" aria-label="Facebook">
                            <img src="img/fb-icon.png" alt="Logo de Facebook">
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link" aria-label="Instagram">
                            <img src="img/ig-icon.png" alt="Logo de Instagram">
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
