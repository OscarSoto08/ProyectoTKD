<?php include 'ui/profile/admin/components/admin_header.php'; ?>
<style>

.navbar-brand {
    font-size: 1.5rem;
}

.card {
    transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
}

.card:hover {
    transform: scale(1.05);
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
}

.accordion-button {
    background-color: #0d6efd;
    color: white;
    border: none;
}

.accordion-button:not(.collapsed) {
    background-color: #0a58ca;
    color: white;
}

.accordion-item {
    border: 1px solid rgba(0, 0, 0, 0.125);
}
/* Botones de acción */
.btn-warning {
    color: #fff;
    background-color: #f0ad4e;
    border-color: #f0ad4e;
}

.btn-danger {
    color: #fff;
    background-color: #d9534f;
    border-color: #d9534f;
}

/* Destacar opciones correctas */
.list-group-item span.bg-success {
    font-weight: bold;
    padding: 0.2rem 0.5rem;
    border-radius: 0.2rem;
}
</style>

<div class="row g-3"> <!-- Aquí aplicamos el gap -->
    <!-- Vista General del Curso -->
    <div class="col"> <!-- Eliminamos la clase .container -->
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1 class="display-5">Curso: Combate</h1>
                <p class="lead">Total de Estudiantes: <strong>30</strong></p>
            </div>
        </div>

        <!-- Niveles del Curso -->
        <div class="row my-3">
            <div class="col-lg-4 col-md-6">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Nivel 1: Introducción</h5>
                        <p class="card-text">Preguntas: 5 | Estudiantes: 15</p>
                        <button class="btn btn-primary w-100" onclick="verNivel(1)">Ver Nivel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Detalle del Nivel -->
    <div class="col" id="nivelDetalle" style="display: none;"> <!-- Eliminamos la clase .container -->
        <h2 class="text-center">Nivel 1: Introducción</h2>
        <p class="text-center">Gestión de preguntas y estudiantes</p>

        <!-- Preguntas estilo "¿Quién Quiere Ser Millonario?" -->
        <div class="accordion" id="preguntasAccordion">
            <div class="accordion-item" id="pregunta1">
                <h2 class="accordion-header" id="heading1">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapsePregunta1">
                        ¿Cuál es el uniforme oficial utilizado en Taekwondo?
                    </button>
                </h2>
                <div id="collapsePregunta1" class="accordion-collapse collapse">
                    <div class="accordion-body">
                        <ul class="list-group mb-3">
                            <li class="list-group-item">A. Kimono</li>
                            <li class="list-group-item">B. Dobok <span class="badge bg-success">Correcta</span></li>
                            <li class="list-group-item">C. Hakana</li>
                            <li class="list-group-item">D. Gi</li>
                        </ul>
                        <!-- Botones de acción -->
                        <button class="btn btn-sm btn-warning me-2" onclick="editarPregunta(1)">Editar</button>
                        <button class="btn btn-sm btn-danger" onclick="eliminarPregunta(1)">Eliminar</button>
                    </div>
                </div>
            </div>
        </div>


        <div class="accordion" id="preguntasAccordion">
            <div class="accordion-item" id="pregunta1">
                <h2 class="accordion-header" id="heading1">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapsePregunta2">
                         ¿Con qué parte del pie se realiza la técnica de ap chagi (patada frontal)?
                    </button>
                </h2>
                <div id="collapsePregunta2" class="accordion-collapse collapse">
                    <div class="accordion-body">
                        <ul class="list-group mb-3">
                            <li class="list-group-item">A. El talón</li>
                            <li class="list-group-item">B. El empeine</li>
                            <li class="list-group-item">C. La bola del pie <span class="badge bg-success">Correcta</span></li>
                            <li class="list-group-item">D. El borde extremo del pie


                            </li>
                        </ul>
                        <!-- Botones de acción -->
                        <button class="btn btn-sm btn-warning me-2" onclick="editarPregunta(1)">Editar</button>
                        <button class="btn btn-sm btn-danger" onclick="eliminarPregunta(1)">Eliminar</button>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>

<!-- Modal para editar preguntas -->
<div class="modal fade" id="modalEditarPregunta" tabindex="-1" aria-labelledby="modalEditarPreguntaLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditarPreguntaLabel">Editar Pregunta</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formEditarPregunta">
                    <div class="mb-3">
                        <label for="preguntaTexto" class="form-label">Pregunta</label>
                        <input type="text" class="form-control" id="preguntaTexto" value="¿Cuál es la raíz cuadrada de 16?">
                    </div>
                    <div class="mb-3">
                        <label for="opcionesRespuesta" class="form-label">Opciones</label>
                        <div id="opcionesRespuesta">
                            <input type="text" class="form-control mb-2" value="A. 6">
                            <input type="text" class="form-control mb-2" value="B. 5">
                            <input type="text" class="form-control mb-2" value="C. 4">
                            <input type="text" class="form-control mb-2" value="D. 3">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="correct_answer" class="form-label">Respuesta Correcta</label>
                        <select class="form-select" id="correct_answer" name="correct_answer" required>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" onclick="guardarEdicion()">Guardar Cambios</button>
            </div>
        </div>
    </div>
</div>
<script>
// Muestra el detalle del nivel seleccionado
function verNivel(nivelId) {
    // Ocultar otros contenidos y mostrar el nivel
    document.getElementById('nivelDetalle').style.display = 'block';
}

// Editar una pregunta (abre el modal y carga los datos)
function editarPregunta(preguntaId) {
    const modal = new bootstrap.Modal(document.getElementById('modalEditarPregunta'));
    modal.show();
    console.log(`Editando pregunta con ID ${preguntaId}`);
}

// Eliminar una pregunta
function eliminarPregunta(preguntaId) {
    if (confirm(`¿Estás seguro de que deseas eliminar la pregunta con ID ${preguntaId}?`)) {
        console.log(`Eliminando pregunta con ID ${preguntaId}`);
        alert("Pregunta eliminada correctamente.");
    }
}

// Guardar los cambios de edición en una pregunta
function guardarEdicion() {
    const preguntaTexto = document.getElementById('preguntaTexto').value;
    const opciones = [...document.querySelectorAll('#opcionesRespuesta input')].map(input => input.value);
    const respuestaCorrecta = document.querySelector('input[name="respuestaCorrecta"]:checked').value;

    console.log("Pregunta editada:", preguntaTexto, opciones, respuestaCorrecta);
    alert("Cambios guardados correctamente.");
    const modal = bootstrap.Modal.getInstance(document.getElementById('modalEditarPregunta'));
    modal.hide();
}
</script>
</body>
</html>
