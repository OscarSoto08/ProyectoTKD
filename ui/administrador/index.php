<?php
include_once 'ui/administrador/componentes/head.php';
?>
<body>
    <main class="container mt-4">
        <h1 class="mb-4">Dashboard</h1>
        <div class="row">
            <div class="col-md-6">
                <div class="card shadow-lg rounded-4 mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Estudiantes por Grado</h5>
                        <canvas id="graficoEstudiantesGrado"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card shadow-lg rounded-4 mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Ingresos Mensuales</h5>
                        <canvas id="graficoIngresos"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card shadow-lg rounded-4 mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Participación en Eventos</h5>
                        <canvas id="graficoParticipacion"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card shadow-lg rounded-4 mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Nuevos Estudiantes</h5>
                        <canvas id="graficoNuevosEstudiantes"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="ui/administrador/js/dashboard.js"></script>
</body>
</html>