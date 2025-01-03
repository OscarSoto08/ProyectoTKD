<?php
include_once 'ui/administrador/componentes/head.php';
?>

    <main class="container mt-4">
        <div class="card shadow-lg rounded-4">
            <div class="card-header bg-light-blue text-white rounded-top-4">
                <h2 class="card-title mb-0 fs-3 fw-bold"><i class="fas fa-calendar-alt me-2"></i> Gestión de Eventos</h2>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-4">
                        <button class="btn btn-primary shadow" data-bs-toggle="modal" data-bs-target="#agregarEventoModal">
                            <i class="fas fa-plus me-1"></i> Agregar Evento
                        </button>
                    </div>
                    <div class="col-md-8">
                        <div class="input-group">
                            <span class="input-group-text bg-white border-end-0"><i class="fas fa-search"></i></span>
                            <input type="text" class="form-control border-start-0 ps-0" placeholder="Buscar evento..." id="buscarEventoInput">
                            <button class="btn btn-outline-secondary" type="button" id="buscarEventoBtn">Buscar</button>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Fecha Inicio</th>
                                <th scope="col">Fecha Fin</th>
                                <th scope="col">Ciudad</th>
                                <th scope="col">Precio</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody id="tablaEventos">
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

    <div class="modal fade" id="agregarEventoModal" tabindex="-1" aria-labelledby="agregarEventoModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-light-blue text-white">
                    <h5 class="modal-title" id="agregarEventoModalLabel">
                        <i class="fas fa-calendar-plus me-2"></i> Agregar Evento</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formEvento">
                        <div class="mb-3">
                            <label for="eventoNombre" class="form-label fw-bold">Nombre</label>
                            <input type="text" class="form-control" id="eventoNombre" required>
                        </div>
                        <div class="mb-3">
                            <label for="eventoDescripcion" class="form-label fw-bold">Descripción</label>
                            <textarea class="form-control" id="eventoDescripcion" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="eventoFechaInicio" class="form-label fw-bold">Fecha Inicio</label>
                            <input type="date" class="form-control" id="eventoFechaInicio" required>
                        </div>
                        <div class="mb-3">
                            <label for="eventoFechaFin" class="form-label fw-bold">Fecha Fin</label>
                            <input type="date" class="form-control" id="eventoFechaFin" required>
                        </div>
                        <div class="mb-3">
                            <label for="eventoCiudad" class="form-label fw-bold">Ciudad</label>
                            <select class="form-select" id="eventoCiudad" required>
                                </select>
                        </div>
                        <div class="mb-3">
                            <label for="eventoPrecio" class="form-label fw-bold">Precio</label>
                            <input type="number" class="form-control" id="eventoPrecio" min="0" step="0.01" required>
                        </div>
                        <div class="mb-3">
                            <label for="eventoEstado" class="form-label fw-bold">Estado</label>
                            <select class="form-select" id="eventoEstado" required>
                                <option value="Borrador">Borrador</option>
                                <option value="Publicado">Publicado</option>
                                <option value="Finalizado">Finalizado</option>
                            </select>
                        </div>
                        <input type="hidden" id="eventoId">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" form="formEvento" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/eventos.js"></script>
</body>
</html>