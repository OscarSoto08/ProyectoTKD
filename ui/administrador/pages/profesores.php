<?php
include_once 'ui/administrador/componentes/head.php';
?>
    <main class="container mt-4">
        <div class="card shadow-lg rounded-4">
            <div class="card-header bg-light-blue text-white rounded-top-4">
                <h2 class="card-title mb-0 fs-3 fw-bold"><i class="fas fa-chalkboard-teacher me-2"></i> Gestión de Profesores</h2>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-4">
                        <button class="btn btn-primary shadow" data-bs-toggle="modal" data-bs-target="#agregarProfesorModal">
                            <i class="fas fa-user-plus me-1"></i> Agregar Profesor
                        </button>
                    </div>
                    <div class="col-md-8">
                        <div class="input-group">
                            <span class="input-group-text bg-white border-end-0"><i class="fas fa-search"></i></span>
                            <input type="text" class="form-control border-start-0 ps-0" placeholder="Buscar profesor..." id="buscarProfesorInput">
                            <button class="btn btn-outline-secondary" type="button" id="buscarProfesorBtn">Buscar</button>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Apellido</th>
                                <th scope="col">Correo</th>
                                <th scope="col">Teléfono</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody id="tablaProfesores">
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

    <div class="modal fade" id="agregarProfesorModal" tabindex="-1" aria-labelledby="agregarProfesorModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-light-blue text-white">
                    <h5 class="modal-title" id="agregarProfesorModalLabel"><i class="fas fa-user-plus me-2"></i> Agregar Profesor</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formProfesor">
                        <div class="mb-3">
                            <label for="profesorNombre" class="form-label fw-bold">Nombre</label>
                            <input type="text" class="form-control" id="profesorNombre" required>
                        </div>
                        <div class="mb-3">
                            <label for="profesorApellido" class="form-label fw-bold">Apellido</label>
                            <input type="text" class="form-control" id="profesorApellido" required>
                        </div>
                        <div class="mb-3">
                            <label for="profesorCorreo" class="form-label fw-bold">Correo</label>
                            <input type="email" class="form-control" id="profesorCorreo" required>
                        </div>
                        <div class="mb-3">
                            <label for="profesorTelefono" class="form-label fw-bold">Teléfono</label>
                            <input type="tel" class="form-control" id="profesorTelefono" required>
                        </div>
                        <div class="mb-3">
                            <label for="profesorEstado" class="form-label fw-bold">Estado</label>
                            <select class="form-select" id="profesorEstado" required>
                                <option value="Activo">Activo</option>
                                <option value="Inactivo">Inactivo</option>
                            </select>
                        </div>
                        <input type="hidden" id="profesorId">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" form="formProfesor" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/profesores.js"></script>
</body>
</html>