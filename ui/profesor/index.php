<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel del Profesor - Taekwondo Kopulso</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css"> <!-- Para agregar estilo personalizado -->
</head>
<body>
    <!-- Cabecera -->
    <header class="bg-primary text-white py-3">
        <div class="container d-flex justify-content-between align-items-center">
            <h1 class="h3">Panel del Profesor - Taekwondo Kopulso</h1>
            <a href="?cs=<?php echo base64_encode("true")?>" class="btn btn-light">Cerrar Sesión</a>
        </div>
    </header>

    <!-- Navegación por Pestañas -->
    <div class="container my-5">
        <ul class="nav nav-tabs" id="panelTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="estudiantes-tab" data-bs-toggle="tab" data-bs-target="#estudiantes" type="button" role="tab" aria-controls="estudiantes" aria-selected="true">Gestión de Estudiantes</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="eventos-tab" data-bs-toggle="tab" data-bs-target="#eventos" type="button" role="tab" aria-controls="eventos" aria-selected="false">Gestión de Eventos</button>
            </li>
        </ul>
        <div class="tab-content" id="panelTabsContent">
            
            <!-- Sección: Gestión de Estudiantes -->
            <div class="tab-pane fade show active" id="estudiantes" role="tabpanel" aria-labelledby="estudiantes-tab">
                <div class="my-4">
                    <h2 class="text-center">Buscar Estudiantes</h2>
                    <!-- Barra de Búsqueda -->
                    <div class="input-group mb-3 mt-4">
                        <input type="text" class="form-control" placeholder="Buscar por nombre o grado" aria-label="Buscar estudiantes" aria-describedby="buscarEstudiantes">
                        <button class="btn btn-primary" type="button" id="buscarEstudiantes">Buscar</button>
                    </div>
                    
                    <!-- Resultados de Búsqueda -->
                    <h4 class="mt-5">Resultados:</h4>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead class="table-dark">
                                <tr>
                                    <th>Nombre</th>
                                    <th>Grado</th>
                                    <th>Progreso</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Juan Pérez</td>
                                    <td>Cinturón Verde</td>
                                    <td>75%</td>
                                    <td><button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#detalleEstudiante1">Ver Detalles</button></td>
                                </tr>
                                <tr>
                                    <td>María López</td>
                                    <td>Cinturón Azul</td>
                                    <td>50%</td>
                                    <td><button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#detalleEstudiante2">Ver Detalles</button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Sección: Gestión de Eventos -->
            <div class="tab-pane fade" id="eventos" role="tabpanel" aria-labelledby="eventos-tab">
                <div class="my-4">
                    <h2 class="text-center">Eventos Disponibles</h2>
                    <div class="accordion mt-4" id="eventosAccordion">
                        <!-- Evento 1 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="evento1Header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#evento1" aria-expanded="true" aria-controls="evento1">
                                    Torneo Regional - Monterrey (30 de Diciembre, 2024)
                                </button>
                            </h2>
                            <div id="evento1" class="accordion-collapse collapse show" aria-labelledby="evento1Header" data-bs-parent="#eventosAccordion">
                                <div class="accordion-body">
                                    <h5>Participantes:</h5>
                                    <table class="table table-striped mt-3">
                                        <thead class="table-dark">
                                            <tr>
                                                <th>Nombre</th>
                                                <th>Grado</th>
                                                <th>Progreso</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Juan Pérez</td>
                                                <td>Cinturón Verde</td>
                                                <td>75%</td>
                                                <td><button class="btn btn-primary btn-sm">Ver Detalles</button></td>
                                            </tr>
                                            <tr>
                                                <td>María López</td>
                                                <td>Cinturón Azul</td>
                                                <td>50%</td>
                                                <td><button class="btn btn-primary btn-sm">Ver Detalles</button></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- Evento 2 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="evento2Header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#evento2" aria-expanded="false" aria-controls="evento2">
                                    Capacitación Avanzada - Guadalajara (15 de Enero, 2025)
                                </button>
                            </h2>
                            <div id="evento2" class="accordion-collapse collapse" aria-labelledby="evento2Header" data-bs-parent="#eventosAccordion">
                                <div class="accordion-body">
                                    <h5>Participantes:</h5>
                                    <table class="table table-striped mt-3">
                                        <thead class="table-dark">
                                            <tr>
                                                <th>Nombre</th>
                                                <th>Grado</th>
                                                <th>Progreso</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Carlos Gómez</td>
                                                <td>Cinturón Negro</td>
                                                <td>85%</td>
                                                <td><button class="btn btn-primary btn-sm">Ver Detalles</button></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-4 mt-5">
        <p>© 2024 Taekwondo Kopulso - Todos los derechos reservados.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
