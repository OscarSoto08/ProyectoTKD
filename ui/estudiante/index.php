<?php 
include_once('ui/estudiante/components/header.php');
?>  

    <!-- Navegación Principal -->
    <div class="container my-4">
        <ul class="nav nav-pills nav-justified" id="panelTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="dashboard-tab" data-bs-toggle="tab" data-bs-target="#dashboard" type="button" role="tab" aria-controls="dashboard" aria-selected="true">
                    <i class="bi bi-house-door"></i> Dashboard
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="juego-tab" data-bs-toggle="tab" data-bs-target="#juego" type="button" role="tab" aria-controls="juego" aria-selected="false">
                    <i class="bi bi-controller"></i> Juego
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="evaluaciones-tab" data-bs-toggle="tab" data-bs-target="#evaluaciones" type="button" role="tab" aria-controls="evaluaciones" aria-selected="false">
                    <i class="bi bi-file-earmark-text"></i> Evaluaciones
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="eventos-tab" data-bs-toggle="tab" data-bs-target="#eventos" type="button" role="tab" aria-controls="eventos" aria-selected="false">
                    <i class="bi bi-calendar-event"></i> Eventos
                </button>
            </li>
        </ul>
    </div>

    <!-- Contenido Principal -->
    <div class="tab-content container" id="panelTabsContent">

        <!-- Dashboard -->
        <div class="tab-pane fade show active" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
            <h2 class="text-center">Dashboard</h2>
            <div class="row mt-4">
                <div class="col-md-6">
                    <div class="card text-center shadow-sm">
                        <div class="card-body">
                            <h4 class="card-title">Progreso Actual</h4>
                            <p>Grado: <strong>Cinturón Verde</strong></p>
                            <div class="progress mb-3">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 75%;">75%</div>
                            </div>
                            <a href="#evaluaciones" class="btn btn-primary">Ver Evaluaciones</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card text-center shadow-sm">
                        <div class="card-body">
                            <h4 class="card-title">Próximos Eventos</h4>
                            <p>Torneo Regional en Monterrey</p>
                            <p>Fecha: 30 de Diciembre, 2024</p>
                            <a href="#eventos" class="btn btn-primary">Ver Eventos</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Juego -->
        <div class="tab-pane fade" id="juego" role="tabpanel" aria-labelledby="juego-tab">
            <div id="pantalla-juego" class="mt-4">
            <h2 class="text-center mb-4">Juego: ¿Quién quiere ser millonario?</h2>
            <!-- Pantalla Inicial -->
            <div id="pantalla-inicial">
                <p class="text-center">Responde preguntas para acumular puntos y mejorar tu conocimiento.</p>
                <button class="btn btn-success d-block mx-auto" id="btn-iniciar-juego">Iniciar Juego</button>
            </div>
            
            <!-- Pantalla de Pregunta -->
            <div id="pantalla-pregunta" class="d-none">
                <h4 class="text-center mb-4" id="pregunta-texto">¿Qué significa Taekwondo?</h4>
                <div class="row">
                    <div class="col-md-6">
                        <button class="btn btn-outline-primary w-100 mb-3 opcion" data-id="0">Arte Marcial Coreano</button>
                    </div>
                    <div class="col-md-6">
                        <button class="btn btn-outline-primary w-100 mb-3 opcion" data-id="1">Defensa con Pies</button>
                    </div>
                    <div class="col-md-6">
                        <button class="btn btn-outline-primary w-100 mb-3 opcion" data-id="2">Fuerza y Velocidad</button>
                    </div>
                    <div class="col-md-6">
                        <button class="btn btn-outline-primary w-100 mb-3 opcion" data-id="3">Camino de la Espada</button>
                    </div>
                </div>
                <div class="text-center mt-3">
                    <button class="btn btn-danger" id="btn-abandonar-juego">Abandonar Juego</button>
                </div>
            </div>
    
                <!-- Pantalla de Finalización -->
                <div id="pantalla-final" class="d-none">
                    <h2 class="text-center">¡Juego Terminado!</h2>
                    <p class="text-center">Tu puntaje final es: <span id="puntaje-final">0</span></p>
                    <button class="btn btn-primary d-block mx-auto" id="btn-reiniciar-juego">Jugar de Nuevo</button>
                </div>
            </div>
        </div>

        <!-- Evaluaciones -->
        <div class="tab-pane fade" id="evaluaciones" role="tabpanel" aria-labelledby="evaluaciones-tab">
            <h2 class="text-center">Historial de Evaluaciones</h2>
            <div class="table-responsive mt-4">
                <table class="table table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>Fecha</th>
                            <th>Pregunta</th>
                            <th>Respuesta Correcta</th>
                            <th>Puntaje</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>2024-12-10</td>
                            <td>¿Qué es un Taeguk?</td>
                            <td>Sí</td>
                            <td>10/10</td>
                        </tr>
                        <tr>
                            <td>2024-12-12</td>
                            <td>¿Cuántos grados tiene un cinturón negro?</td>
                            <td>9</td>
                            <td>8/10</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Eventos -->
        <div class="tab-pane fade" id="eventos" role="tabpanel" aria-labelledby="eventos-tab">
            <h2 class="text-center">Eventos Disponibles</h2>
            <div class="row mt-4">
                <div class="col-md-6">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Torneo Regional</h5>
                            <p>Fecha: 30 de Diciembre, 2024</p>
                            <p>Ciudad: Monterrey</p>
                            <button class="btn btn-primary w-100">Inscribirse</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Capacitación Avanzada</h5>
                            <p>Fecha: 15 de Enero, 2025</p>
                            <p>Ciudad: Guadalajara</p>
                            <button class="btn btn-primary w-100">Inscribirse</button>
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


<script>
 // Preguntas y Respuestas
const preguntas = [
    {
        pregunta: "¿Qué significa la palabra 'Taekwondo'?",
        opciones: ["Arte Marcial Coreano", "Defensa con Pies", "Fuerza y Velocidad", "Camino de la Espada"],
        respuesta: 0,
    },
    {
        pregunta: "¿Cuántos grados tiene un cinturón negro?",
        opciones: ["5", "7", "9", "10"],
        respuesta: 2,
    },
    {
        pregunta: "¿Qué es un Taeguk?",
        opciones: ["Un cinturón", "Un torneo", "Un símbolo", "Un patrón de movimientos"],
        respuesta: 3,
    },
];

let nivelActual = 0;
let puntaje = 0;

// Referencias del DOM
const pantallaInicial = document.getElementById("pantalla-inicial");
const pantallaPregunta = document.getElementById("pantalla-pregunta");
const pantallaFinal = document.getElementById("pantalla-final");

const preguntaTexto = document.getElementById("pregunta-texto");
const opciones = document.querySelectorAll(".opcion");
const puntajeFinal = document.getElementById("puntaje-final");
const btnIniciarJuego = document.getElementById("btn-iniciar-juego");
const btnReiniciarJuego = document.getElementById("btn-reiniciar-juego");
const btnAbandonarJuego = document.getElementById("btn-abandonar-juego");

// Funciones del Juego
function iniciarJuego() {
    nivelActual = 0;
    puntaje = 0;
    pantallaInicial.classList.add("d-none");
    pantallaPregunta.classList.remove("d-none");
    mostrarPregunta();
}

function mostrarPregunta() {
    const preguntaActual = preguntas[nivelActual];
    preguntaTexto.textContent = preguntaActual.pregunta;
    opciones.forEach((boton, index) => {
        boton.textContent = preguntaActual.opciones[index];
        boton.classList.remove("disabled");
    });
}

function verificarRespuesta(id) {
    const preguntaActual = preguntas[nivelActual];
    if (id === preguntaActual.respuesta) {
        puntaje += 10;
    }
    nivelActual++;

    if (nivelActual < preguntas.length) {
        mostrarPregunta();
    } else {
        terminarJuego();
    }
}

function terminarJuego() {
    pantallaPregunta.classList.add("d-none");
    pantallaFinal.classList.remove("d-none");
    puntajeFinal.textContent = puntaje;
}

function reiniciarJuego() {
    pantallaFinal.classList.add("d-none");
    pantallaInicial.classList.remove("d-none");
}

function abandonarJuego() {
    pantallaPregunta.classList.add("d-none");
    pantallaInicial.classList.remove("d-none");
}

// Event Listeners
btnIniciarJuego.addEventListener("click", iniciarJuego);
btnReiniciarJuego.addEventListener("click", reiniciarJuego);
btnAbandonarJuego.addEventListener("click", abandonarJuego);

opciones.forEach((boton, index) => {
    boton.addEventListener("click", () => verificarRespuesta(index));
});

</script>