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
<body>
<div class="d-flex flex-row m-auto row g-3 container align-center justify-content-around">
    <!-- Vista General del Curso -->
    <div class="col my-4">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1 class="display-5">Curso: <?php echo 'combate'; ?></h1>
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
    <div class="col" id="nivelDetalle" style="display: none;">
        <h2 class="text-center">Nivel 1: Introducción</h2>
        <p class="text-center">Gestión de preguntas y estudiantes</p>

        <!-- Preguntas estilo "¿Quién Quiere Ser Millonario?" -->
        <div class="accordion" id="preguntasAccordion">
        <div class="accordion-item">
            <h2 class="accordion-header">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                ¿
            </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
            <div class="accordion-body">
            <ul class="list-group mb-3">
                    <li class="list-group-item">A. 6</li>
                    <li class="list-group-item">B. 5</li>
                    <li class="list-group-item">C. 4 <span class="badge bg-success">Correcta</span></li>
                    <li class="list-group-item">D. 3</li>
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
                        <div class="form-check mb-3">
                            <input type="radio" class="form-check-input" name="respuestaCorrecta" value="2" checked>
                            <label class="form-check-label">Respuesta Correcta: C</label>
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
    // Simular carga de datos específicos de la pregunta en el modal
    const modal = new bootstrap.Modal(document.getElementById('modalEditarPregunta'));
    modal.show();

    console.log(`Editando pregunta con ID ${preguntaId}`);
    // Aquí puedes implementar la lógica para obtener la información de la pregunta desde el backend y cargarla en el modal.
}

// Eliminar una pregunta
function eliminarPregunta(preguntaId) {
    if (confirm(`¿Estás seguro de que deseas eliminar la pregunta con ID ${preguntaId}?`)) {
        console.log(`Eliminando pregunta con ID ${preguntaId}`);
        // Aquí se realizaría la petición al backend para eliminar la pregunta.
        alert("Pregunta eliminada correctamente.");
    }
}

// Guardar los cambios de edición en una pregunta
function guardarEdicion() {
    const preguntaTexto = document.getElementById('preguntaTexto').value;
    const opciones = [...document.querySelectorAll('#opcionesRespuesta input')].map(input => input.value);
    const respuestaCorrecta = document.querySelector('input[name="respuestaCorrecta"]:checked').value;

    console.log("Pregunta editada:");
    console.log("Texto:", preguntaTexto);
    console.log("Opciones:", opciones);
    console.log("Respuesta Correcta (Índice):", respuestaCorrecta);

    alert("Cambios guardados correctamente.");
    const modal = bootstrap.Modal.getInstance(document.getElementById('modalEditarPregunta'));
    modal.hide();
}


    </script>
</body>
</html>
