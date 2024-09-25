<nav class="navbar navbar-dark bg-dark fixed-top">
        <div class="container-fluid d-flex justify-content-between">
            <a class="navbar-brand" href="#"><img src="img/image.png" alt="Logo de kopulso"></a>
            <a class="navbar-brand" href="#" id="navbar-brand">LTA (Learning Taekwondo Application)</a>
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
                            <a class="nav-link active dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                                Inicio
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark">
                                <li><a class="dropdown-item" data-page="includes/info-general.php">Información General</a></li>
                                <li><a class="dropdown-item" data-page="includes/historia.php">Historia</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" data-page="includes/arbol.php">Arbol Genealógico</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                                Ingresar
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark">
                                <li><a class="dropdown-item" data-page="includes/login.php" href="#">Iniciar Sesion</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" data-page="includes/registro.php" href="#">Registrarse</a></li>                                
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="events.html">Eventos</a>
                        </li>
                    </ul>
                    <!-- <h5 class="mx-auto">Siguenos en nuestras redes sociales</h5> -->
                    <ul class="d-flex mt-6 justify-content-evenly" id="redes">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <img src="img/wpp-icon.png"  alt="Logo-wpp">
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <img src="img/fb-icon.png" alt="">
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <img src="img/ig-icon.png" alt="" srcset="">
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>