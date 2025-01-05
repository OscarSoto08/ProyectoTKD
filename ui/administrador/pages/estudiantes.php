<?php
include_once 'ui/administrador/componentes/head.php';
?>

    <main class="container mt-4">
        <div class="card shadow-lg rounded-4">
            <div class="card-header bg-light-blue text-white rounded-top-4">
                <h1 class="card-title mb-0 fs-3 fw-bold"><i class="fas fa-users me-2"></i> Gestión de Estudiantes</h1>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-4">
                        <button class="btn btn-primary shadow" data-bs-toggle="modal" data-bs-target="#agregarEstudianteModal">
                            <i class="fas fa-user-plus me-1"></i> Agregar Estudiante
                        </button>
                    </div>
                    <div class="col-md-8">
                        <div class="input-group">
                            <span class="input-group-text bg-white border-end-0"><i class="fas fa-search"></i></span>
                            <input type="text" class="form-control border-start-0 ps-0" placeholder="Buscar estudiante..." id="buscarEstudianteInput">
                            <button class="btn btn-outline-secondary" type="button" id="buscarEstudianteBtn">Buscar</button>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th scope="col" class="text-center">ID</th>
                                <th scope="col" class="text-center">Nombre</th>
                                <th scope="col" class="text-center">Apellido</th>
                                <th scope="col" class="text-center">Grado</th>
                                <th scope="col" class="text-center">Correo</th>
                                <th scope="col" class="text-center">Edad</th>
                                <th scope="col" class="text-center">Teléfono</th>
                                <th scope="col" class="text-center">Estado</th>
                            </tr>
                        </thead>
                        <tbody id="tablaEstudiantes">
                            <?php 
                            foreach (Estudiante::consultarTodos() as $usuario) {
                            ?>    <tr>
                                    <td class="text-center"><?php echo $usuario -> getIdUsuario() ?></td>
                                    <td class="text-center"><?php echo $usuario -> getNombre() ?></td>
                                    <td class="text-center"><?php echo $usuario -> getApellido() ?></td>
                                    <td class="text-center"><?php echo $usuario -> getGrado() -> getNombre() ?></td>
                                    <td class="text-center"><?php echo $usuario -> getCorreo() ?></td>
                                    <td class="text-center"><?php echo Persona::calcularEdad(new Datetime($usuario -> getFechaNacimiento())) ?></td>
                                    <td class="text-center"><?php echo $usuario -> getTelefono() ?></td>
                                    <td class="text-center"><?php echo $usuario -> getEstado() ?></td>
                                </tr> <?php
                            }
                            ?>
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

    <div class="modal fade" id="agregarEstudianteModal" tabindex="-1" aria-labelledby="agregarEstudianteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-light-blue text-white">
                    <h5 class="modal-title" id="agregarEstudianteModalLabel"><i class="fas fa-user-plus me-2"></i> Agregar Estudiante</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formEstudiante">
                        <div class="mb-3">
                            <label for="nombre" class="form-label fw-bold">Nombre</label>
                            <input type="text" class="form-control" id="nombre" required>
                        </div>
                        <div class="mb-3">
                            <label for="apellido" class="form-label fw-bold">Apellido</label>
                            <input type="text" class="form-control" id="apellido" required>
                        </div>
                        <div class="mb-3">
                            <label for="grado" class="form-label fw-bold">Grado</label>
                            <select class="form-select" id="grado" required>
                                </select>
                        </div>
                        <div class="mb-3">
                            <label for="correo" class="form-label fw-bold">Correo</label>
                            <input type="email" class="form-control" id="correo" required>
                        </div>
                        <div class="mb-3">
                            <label for="telefono" class="form-label fw-bold">Teléfono</label>
                            <input type="tel" class="form-control" id="telefono" required>
                        </div>
                        <input type="hidden" id="estudianteId">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" form="formEstudiante" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/estudiantes.js"></script>
</body>
</html>