<?php include ('ui/profile/admin/components/admin_header.php');?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Plataforma para aprender de manera interactiva con cursos online.">
    <meta name="keywords" content="cursos online, educación, aprender, plataforma de cursos">
    <title>Plataforma de Cursos Online</title>

    <!-- Enlace a Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Enlace a Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Estilos personalizados -->
     <style>
        /* Estilos Generales */
body {
    font-family: 'Roboto', sans-serif;
    margin: 0;
    padding: 0;
    background-color: var(--pri);
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

.hero .btn {
    font-size: 1.2rem;
    padding: 15px 30px;
}

/* Categorías Populares */
.card {
    border: none;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease;
    background-color: #8597C4;
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

#cursos .btn-primary {
    background-color: #007bff;
    border: none;
    padding: 10px 20px;
}

#cursos .btn-primary:hover {
    background-color: #0056b3;
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
                        <a href="?pid=<?php echo base64_encode('ui/profile/admin/pages/course.php');?>" class="btn btn-primary">Ver Curso</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="card">
                    <img src="img/poomsae.webp" class="card-img-top" alt="Curso de Marketing Digital">
                    <div class="card-body">
                        <h5 class="card-title">Poomsae</h5>
                        <p class="card-text">Domina las herramientas y estrategias de marketing online.</p>
                        <a href="#" class="btn btn-primary">Ver Curso</a>
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
                        <a href="#" class="btn btn-primary">Ver Curso</a>
                    </div>
                </div>
            </div>
             <div class="col-md-6 mb-4">
                <div class="card">
                    <img src="img/def_personal.jpeg" class="card-img-top" alt="Curso de Diseño UX/UI">
                    <div class="card-body">
                        <h5 class="card-title">Defensa Personal</h5>
                        <p class="card-text">Crea experiencias de usuario excepcionales con diseño UX/UI.</p>
                        <a href="#" class="btn btn-primary">Ver Curso</a>
                    </div>
                </div>
            </div>
        </div>
</section>



</body>
</html>
