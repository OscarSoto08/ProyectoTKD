
<!-- Modal de Bootstrap -->
<div class="modal fade" id="modal_galeria" tabindex="-1" aria-labelledby="galleryModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="galleryModalLabel">Administrar Galería de Imágenes</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Formulario para agregar/editar una imagen -->
                <form id="galleryForm">
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