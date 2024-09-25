<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="kopulso, club de taekwondo, LTA, Learning Taekwondo Application"> 
    <title>LTA - Kopulso</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@400;700&display=swap" rel="stylesheet">

    <!-- JQUERY -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/script.js" defer></script>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/styleAG.css">
    <style>
        * {
            font-family: 'Noto Sans KR', sans-serif;
        }
        body {
            height: 100vh;
            padding-top: 120px;
        }
        .navbar-brand img {
            width: 60px;
            height: 60px;
        }
        #navbar-brand {
            font-size: 30px;
        }
        .navbar-toggler-icon {
            position: relative;
            padding: 5px;
        }
        @media (max-width: 768px) {
            #navbar-brand {
                font-size: 22px;
            }
            .navbar-brand img {
                width: 40px;
                height: 40px;
            }
            .navbar-toggler {
                width: 40px;
                height: 40px;
            }
        }

        @media (max-width: 576px) {
            #navbar-brand {
                font-size: 15px;
            }
            .navbar-brand img {
                width: 25px;
                height: 25px;
            }
            .navbar-toggler {
                width: 25px;
                height: 25px;
                overflow: hidden;
            }
        }
        .card-header {
            width: 100%;
            text-align: center;
        }

        #redes img{
            width: 50px; 
            height: 50px;
        }
        
    </style>
</head>
<body>
    <nav class="navbar navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
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
                                <li><a class="dropdown-item"  data-page="includes/info-general.php">Información General</a></li>
                                <li><hr class="dropdown-divider"></li>
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
                                <li><a class="dropdown-item" data-page="includes/info-general.php" href="#">Iniciar Sesion</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" data-page="includes/historia.php" href="#">Registrarse</a></li>                                
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
    <div id="datos">
        <div class="row mb-10 container mx-auto">
            <div class="col">
                <!-- CONTENIDO DINAMICO -->
                <div class="card border-dark p-7" id="content">
                    <?php require_once('includes/info-general.php')?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
