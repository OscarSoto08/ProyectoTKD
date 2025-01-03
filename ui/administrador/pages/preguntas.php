<?php
include_once 'ui/administrador/componentes/head.php';
?>

    <main class="container mt-4">
        <div class="card shadow-lg rounded-4">
            <div class="card-header bg-light-blue text-white rounded-top-4">
                <h2 class="card-title mb-0 fs-3 fw-bold"><i class="fas fa-question-circle me-2"></i> Gestión de Preguntas</h2>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-4">
                        <button class="btn btn-primary shadow" data-bs-toggle="modal" data-bs-target="#agregarPreguntaModal">
                            <i class="fas fa-plus me-1"></i> Agregar Pregunta
                        </button>
                    </div>
                    <div class="col-md-8">
                        <div class="input-group">
                            <span class="input-group-text bg-white border-end-0"><i class="fas fa-search"></i></span>
                            <input type="text" class="form-control border-start-0 ps-0" placeholder="Buscar pregunta..." id="buscarPreguntaInput">
                            <button class="btn btn-outline-secondary" type="button" id="buscarPreguntaBtn">Buscar</button>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Texto Pregunta</th>
                                <th scope="col">Sub-Curso</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody id="tablaPreguntas">
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

    <div class="modal fade" id="agregarPreguntaModal" tabindex="-1" aria-labelledby="agregarPreguntaModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-light-blue text-white">
                    <h5 class="modal-title" id="agregarPreguntaModalLabel"><i class="fas fa-question-circle me-2"></i> Agregar Pregunta</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formPregunta">
                        <div class="mb-3">
                            <label for="preguntaTexto" class="form-label fw-bold">Texto de la Pregunta</label>
                            <textarea class="form-control" id="preguntaTexto" rows="2" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="subcurso" class="form-label fw-bold">Sub-Curso</label>
                            <select class="form-select" id="subcurso" required>
                                </select>
                        </div>
                        <div id="seccionRespuestas">
                            </div>
                        <button type="button" class="btn btn-secondary mt-3" id="agregarRespuesta">
                            <i class="fas fa-plus me-1"></i> Agregar Respuesta
                        </button>
                        <input type="hidden" id="preguntaId">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" form="formPregunta" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/preguntas.js"></script>
</body>
</html>