
<!-- Modal para el formulario de Evento -->
<div class="modal fade" id="modal_evento" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="eventModalLabel"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <!-- Formulario para el evento -->
                <form id="eventForm">
                    <!-- Campo ID (oculto) -->
                    <input type="hidden" id="eventId" name="id">

                    <!-- Nombre del Evento -->
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                    </div>

                    <!-- Descripción del Evento -->
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required></textarea>
                    </div>

                    <!-- Fecha de Inicio -->
                    <div class="mb-3">
                        <label for="fecha_inicio" class="form-label">Fecha de Inicio</label>
                        <input type="datetime-local" class="form-control" id="fecha_inicio" name="fecha_inicio" required>
                    </div>

                    <!-- Fecha de Fin -->
                    <div class="mb-3">
                        <label for="fecha_fin" class="form-label">Fecha de Fin</label>
                        <input type="datetime-local" class="form-control" id="fecha_fin" name="fecha_fin" required>
                    </div>

                    <!-- Ciudad -->
                    <div class="mb-3">
                        <label for="ciudad" class="form-label">Ciudad</label>
                        <input type="text" class="form-control" id="ciudad" name="ciudad" required>
                    </div>

                    <!-- Precio -->
                    <div class="mb-3">
                        <label for="precio" class="form-label">Precio</label>
                        <input type="number" class="form-control" id="precio" name="precio" step="0.01" required>
                    </div>

                    <!-- Estado -->
                    <div class="mb-3">
                        <label for="estado" class="form-label">Estado</label>
                        <select class="form-select" id="estado" name="estado" required>
                            <option value="VENCIDO">Vencido</option>
                            <option value="DISPONIBLE">Disponible</option>
                        </select>
                    </div>

                    

                    <div class="modal-footer">
                    <!-- Botón de Guardar -->
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar Evento</button>
                </div>
            </form>


            <!-- Formulario para agregar/editar una imagen -->
            <form id="galleryForm">
                <h2 class="text-center">Gestionar Imagenes</h2>
                    <input type="hidden" id="imageId" name="imageId" value="">
                    <div class="mb-3">
                        <label for="imageTitle" class="form-label">Título de la imagen</label>
                        <input type="text" class="form-control" id="imageTitle" name="imageTitle" required>
                    </div>
                    <div class="mb-3">
                        <label for="imageFile" class="form-label">Archivo de imagen</label>
                        <input type="file" class="form-control" id="imageFile" name="imageFile">
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </form>

                <!-- Tabla para mostrar las imágenes de la galería -->
                <table class="table mt-3" id="galleryTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Título</th>
                            <th>Imagen</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Aquí se agregarán las imágenes con AJAX -->
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>