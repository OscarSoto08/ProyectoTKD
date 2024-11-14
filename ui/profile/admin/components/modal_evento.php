
<!-- Modal para el formulario de Evento -->
<div class="modal fade" id="modal_evento" tabindex="-1" aria-labelledby="eventModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="eventModalLabel">Detalles del Evento</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Formulario para el evento -->
                <form id="eventForm">
                    <!-- Campo ID (oculto) -->
                    <input type="hidden" id="eventId" name="id">

                    <!-- Nombre del Evento -->
                    <div class="mb-3">
                        <label for="eventName" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="eventName" name="nombre" required>
                    </div>

                    <!-- Descripción del Evento -->
                    <div class="mb-3">
                        <label for="eventDescription" class="form-label">Descripción</label>
                        <textarea class="form-control" id="eventDescription" name="descripcion" rows="3" required></textarea>
                    </div>

                    <!-- Fecha de Inicio -->
                    <div class="mb-3">
                        <label for="startDate" class="form-label">Fecha de Inicio</label>
                        <input type="date" class="form-control" id="startDate" name="fecha_inicio" required>
                    </div>

                    <!-- Fecha de Fin -->
                    <div class="mb-3">
                        <label for="endDate" class="form-label">Fecha de Fin</label>
                        <input type="date" class="form-control" id="endDate" name="fecha_fin" required>
                    </div>

                    <!-- Ciudad -->
                    <div class="mb-3">
                        <label for="city" class="form-label">Ciudad</label>
                        <input type="text" class="form-control" id="city" name="ciudad" required>
                    </div>

                    <!-- Precio -->
                    <div class="mb-3">
                        <label for="price" class="form-label">Precio</label>
                        <input type="number" class="form-control" id="price" name="precio" step="0.01" required>
                    </div>

                    <!-- Estado -->
                    <div class="mb-3">
                        <label for="status" class="form-label">Estado</label>
                        <select class="form-select" id="status" name="estado" required>
                            <option value="Activo">Activo</option>
                            <option value="Inactivo">Inactivo</option>
                        </select>
                    </div>

                    <!-- Botón de Guardar -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar Evento</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>