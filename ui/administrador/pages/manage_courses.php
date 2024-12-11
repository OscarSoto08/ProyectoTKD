<?php require 'ui/profile/admin/components/admin_header.php'; ?>

    <!-- Estilos personalizados -->
     <style>
        /* Estilos Generales */
body {
    font-family: 'Roboto', sans-serif;
    margin: 0;
    padding: 0;
}

h1, h2, h3 {
    font-weight: 500;
}

/* Hero Section */
.hero {
    color: white;
    padding: 60px 0;
    text-align: center;
}

.hero h1 {
    font-size: 3rem;
    margin-bottom: 20px;
}

.hero .lead {
    font-size: 1.25rem;
    margin-bottom: 30px;
}


/* Categorías Populares */
.card {
    border: none;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease;
    background-color: var(--pri);
}

.card:hover {
    transform: translateY(-10px);
}

.card-body {
    padding: 20px;
}

.card-title {
    font-size: 1.25rem;
    font-weight: 500;
    margin-bottom: 10px;
}

.card-text {
    font-size: 1rem;
    margin-bottom: 20px;
}

/* Cursos Destacados */
#cursos {
    background-color: #f8f9fa;
    margin: 0 auto;
    min-width: 90%;
}

#cursos .card {
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
}

#cursos .card-body {
    padding: 20px;
}



/* Footer */
footer {
    background-color: #343a40;
    color: white;
}

footer p {
    margin: 0;
}

/* Responsividad */
@media (max-width: 768px) {
    .hero h1 {
        font-size: 2.5rem;
    }

    .hero .lead {
        font-size: 1rem;
    }
}

     </style>
</head>
<body>

<!-- Hero Section -->
<!-- <section class="hero bg-primary text-white text-center py-5">
    <div class="container">
        <h1 class="display-4">Bienvenido a la Plataforma de Cursos Online</h1>
        <p class="lead">Aprende nuevas habilidades con los mejores expertos en diversos campos.</p>
        <a href="#cursos" class="btn btn-light btn-lg">Explora los Cursos</a>
    </div>
</section> -->

<!-- Cursos Destacados -->
<section id="cursos" class="container">
        <h2 class="text-center mb-4">Disciplinas de aprendizaje</h2>
        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="card">
                    <img src="img/tkd_combate.webp" class="card-img-top" alt="Curso de JavaScript">
                    <div class="card-body">
                        <h5 class="card-title">Combate - Gyeorugi</h5>
                        <p class="card-text">Aprende JavaScript desde cero hasta nivel avanzado.</p>
                        <a class="btn fill" href="?pid=<?php echo base64_encode('ui/profile/admin/pages/combate_course.php');?>" class="btn btn-primary">Ver Curso</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="card">
                    <img src="img/poomsae.webp" class="card-img-top" alt="Curso de Marketing Digital">
                    <div class="card-body">
                        <h5 class="card-title">Poomsae</h5>
                        <p class="card-text">Domina las herramientas y estrategias de marketing online.</p>
                        <a href="#" class="btn fill">Ver Curso</a>
                    </div>
                </div>
            </div>
            </div>
            <div class="row">
            <div class="col-md-6 mb-4">
                <div class="card">
                    <img src="img/terminologia.jpg" class="card-img-top" alt="Curso de Diseño UX/UI">
                    <div class="card-body">
                        <h5 class="card-title">Terminologia del Taekwondo </h5>
                        <p class="card-text">Crea experiencias de usuario excepcionales con diseño UX/UI.</p>
                        <a href="#" class="btn fill">Ver Curso</a>
                    </div>
                </div>
            </div>
             <div class="col-md-6 mb-4">
                <div class="card">
                    <img src="img/def_personal.jpeg" class="card-img-top" alt="Curso de Diseño UX/UI">
                    <div class="card-body">
                        <h5 class="card-title">Defensa Personal</h5>
                        <p class="card-text">Crea experiencias de usuario excepcionales con diseño UX/UI.</p>
                        <a href="#" class="btn fill">Ver Curso</a>
                    </div>
                </div>
            </div>
        </div>
</section>



</body>
</html>
