
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
    background-color: #f8f9fa;
}

h1, h2, h3 {
    font-weight: 500;
}

/* Hero Section */
.hero {
    background-color: #007bff;
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
<section class="hero bg-primary text-white text-center py-5">
    <div class="container">
        <h1 class="display-4">Bienvenido a la Plataforma de Cursos Online</h1>
        <p class="lead">Aprende nuevas habilidades con los mejores expertos en diversos campos.</p>
        <a href="#cursos" class="btn btn-light btn-lg">Explora los Cursos</a>
    </div>
</section>

<!-- Categorías Populares -->
<section class="container my-5">
    <h2 class="text-center mb-4">Categorías Populares</h2>
    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="https://via.placeholder.com/400x200" class="card-img-top" alt="Tecnología">
                <div class="card-body text-center">
                    <h5 class="card-title">Tecnología</h5>
                    <p class="card-text">Cursos de desarrollo web, programación, inteligencia artificial y más.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="https://via.placeholder.com/400x200" class="card-img-top" alt="Negocios">
                <div class="card-body text-center">
                    <h5 class="card-title">Negocios</h5>
                    <p class="card-text">Cursos sobre marketing digital, gestión empresarial, finanzas y más.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="https://via.placeholder.com/400x200" class="card-img-top" alt="Diseño">
                <div class="card-body text-center">
                    <h5 class="card-title">Diseño</h5>
                    <p class="card-text">Cursos sobre diseño gráfico, UX/UI, y herramientas de diseño.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Cursos Destacados -->
<section id="cursos" class="bg-light py-5">
    <div class="container">
        <h2 class="text-center mb-4">Cursos Destacados</h2>
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="https://via.placeholder.com/400x200" class="card-img-top" alt="Curso de JavaScript">
                    <div class="card-body">
                        <h5 class="card-title">Curso de JavaScript</h5>
                        <p class="card-text">Aprende JavaScript desde cero hasta nivel avanzado.</p>
                        <a href="#" class="btn btn-primary">Ver Curso</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="https://via.placeholder.com/400x200" class="card-img-top" alt="Curso de Marketing Digital">
                    <div class="card-body">
                        <h5 class="card-title">Curso de Marketing Digital</h5>
                        <p class="card-text">Domina las herramientas y estrategias de marketing online.</p>
                        <a href="#" class="btn btn-primary">Ver Curso</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="https://via.placeholder.com/400x200" class="card-img-top" alt="Curso de Diseño UX/UI">
                    <div class="card-body">
                        <h5 class="card-title">Curso de Diseño UX/UI</h5>
                        <p class="card-text">Crea experiencias de usuario excepcionales con diseño UX/UI.</p>
                        <a href="#" class="btn btn-primary">Ver Curso</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="bg-dark text-white text-center py-3">
    <p>&copy; 2024 Plataforma de Cursos Online. Todos los derechos reservados.</p>
</footer>

<!-- Bootstrap JS y dependencias -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
