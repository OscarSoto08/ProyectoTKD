<?php
include_once 'ui/administrador/componentes/head.php';
?>

    <main class="container mt-4">
    <div class="card shadow-lg rounded-4">
        <div class="card-header bg-light-blue text-white rounded-top-4">
            <h2 class="card-title mb-0 fs-3 fw-bold"><i class="fas fa-list me-2"></i> Gestión de Cursos</h2>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-4">
                    <button class="btn btn-primary shadow" data-bs-toggle="modal" data-bs-target="#agregarCursoModal">
                        <i class="fas fa-plus me-1"></i> Agregar Curso
                    </button>
                </div>
                <div class="col-md-8">
                    <div class="input-group">
                        <span class="input-group-text bg-white border-end-0"><i class="fas fa-search"></i></span>
                        <input type="text" class="form-control border-start-0 ps-0" placeholder="Buscar curso..." id="buscarCursoInput">
                        <button class="btn btn-outline-secondary" type="button" id="buscarCursoBtn">Buscar</button>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Nivel</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="tablaCursos">
                        </tbody>
                </table>
            </div>
        </div>
    </div>
    </main>

    <div class="modal fade" id="agregarCursoModal" tabindex="-1" aria-labelledby="agregarCursoModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-light-blue text-white">
                    <h5 class="modal-title" id="agregarCursoModalLabel"><i class="fas fa-plus me-2"></i> Agregar Curso</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formCurso">
                        <div class="mb-3">
                            <label for="cursoNombre" class="form-label fw-bold">Nombre</label>
                            <input type="text" class="form-control" id="cursoNombre" required>
                        </div>
                        <div class="mb-3">
                            <label for="cursoNivel" class="form-label fw-bold">Nivel</label>
                            <select class="form-select" id="cursoNivel" required>
                            </select>
                        </div>
                        <input type="hidden" id="cursoId">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" form="formCurso" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/cursos.js"></script>
</body>
</html>