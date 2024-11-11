<?php 
require 'ui/profile/student/components/header.php';
?>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Baskervville+SC&family=Zilla+Slab:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,50');

    :root {
        --primary: <?php echo $primary_color[$estudiante->getGrado()]; ?>;
        --secondary: <?php echo $secondary_color[$estudiante->getGrado()]; ?>;
    }

    /* Estilos generales */
    * {
        color: var(--secondary);
        font-family: 'Zilla Slab', sans-serif;
    }

    body {
        background-color: var(--primary);
    }

    /* Estilos para la navbar */
    .navbar {
        background-color: black;
    }

    .navbar * {
        color: var(--primary);
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    .navbar *:hover {
        color: beige;
    }

    .navbar .nav-link:focus,
    .navbar .nav-link:active {
        background-color: transparent;
        color: #ffffff;
        outline: none;
    }

    /* Estilo de enlaces */
    a {
        text-decoration: none;
        color: var(--secondary);
        font-weight: bold;
        font-family: Arial, sans-serif;
        transition: color 0.3s ease, text-decoration 0.3s ease;
    }

    a:hover {
        color: beige;
        text-decoration: underline;
    }

    a:active {
        color: #003366;
        text-decoration: none;
        background-color: #e2e2e2;
    }

    /* CSS personalizado para el tamaño uniforme de las imágenes */
    .carousel-item img {
        border-radius: 5px;
        height: 400px;       /* Altura fija para todas las imágenes */

        object-fit: fill;   /* Recorta la imagen para llenar el espacio sin distorsión */
        width: 100%;         /* Ancho completo del contenedor */
        transition: transform 0.5s ease; /* Transición suave en el cambio de imagen */
    }

    #carouselExample{
        width: 70%;
    }

</style>
<body>
    <div class="container">
        <h1>Cursos disponibles</h1>
        <div class="row">
            <div class="col">
                <div class="container"><a href="">Combate</a></div>
            </div>
            <div class="col">
                <div class="container"><a href="">Poomsae</a></div>
            </div>
            <div class="col">
                <div class="container"><a href="">Terminologia</a></div>
            </div>
            <div class="col">
                <div class="container"><a href="">Defensa Personal</a></div>
            </div>
        </div>
        
        <?php include 'ui/profile/student/components/carousel.php'?>
    
    </div>

    

</body>
</html>
