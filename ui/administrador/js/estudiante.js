document.addEventListener('DOMContentLoaded', () => {
    const tablaEstudiantes = document.getElementById('tablaEstudiantes');
    const formEstudiante = document.getElementById('formEstudiante');
    const gradoSelect = document.getElementById('grado');
    const buscarEstudianteInput = document.getElementById('buscarEstudianteInput');
    const buscarEstudianteBtn = document.getElementById('buscarEstudianteBtn');

    // Datos de ejemplo (simulando la respuesta de una API)
    let estudiantes = [
        { id: 1, nombre: 'Juan', apellido: 'Pérez', grado: 'Cinturón Negro', correo: 'juan.perez@example.com', telefono: '1234567890', estado: 'Activo' },
        { id: 2, nombre: 'María', apellido: 'González', grado: 'Cinturón Rojo', correo: 'maria.gonzalez@example.com', telefono: '9876543210', estado: 'Activo' },
        // Agrega más datos de ejemplo aquí
    ];

    const grados = [
        'Cinturón Blanco',
        'Cinturón Amarillo',
        'Cinturón Verde',
        'Cinturón Azul',
        'Cinturón Rojo',
        'Cinturón Negro'
    ];

    // Cargar datos en la tabla
    function cargarEstudiantes(estudiantesData = estudiantes) {
        tablaEstudiantes.innerHTML = '';
        estudiantesData.forEach(estudiante => {
            const fila = document.createElement('tr');
            fila.innerHTML = `
                <td>${estudiante.id}</td>
                <td>${estudiante.nombre}</td>
                <td>${estudiante.apellido}</td>
                <td>${estudiante.grado}</td>
                <td>${estudiante.correo}</td>
                <td>${estudiante.telefono}</td>
                <td>${estudiante.estado}</td>
                <td>
                    <button class="btn btn-sm btn-primary editar" data-id="${estudiante.id}"><i class="fas fa-edit"></i></button>
                    <button class="btn btn-sm btn-danger eliminar" data-id="${estudiante.id}"><i class="fas fa-trash"></i></button>
                </td>
            `;
            tablaEstudiantes.appendChild(fila);
        });

        // Eventos para editar y eliminar
        const botonesEditar = document.querySelectorAll('.editar');
        botonesEditar.forEach(boton => {
            boton.addEventListener('click', () => {
                const id = boton.dataset.id;
                const estudiante = estudiantes.find(e => e.id === parseInt(id));
                cargarDatosEstudiante(estudiante);
                // Abre el modal
                const modal = new bootstrap.Modal(document.getElementById('agregarEstudianteModal'));
                modal.show();
            });
        });

        const botonesEliminar = document.querySelectorAll('.eliminar');
        botonesEliminar.forEach(boton => {
            boton.addEventListener('click', () => {
                const id = boton.dataset.id;
                // Aquí iría la lógica para confirmar la eliminación y luego eliminar el estudiante
                if(confirm('Estas seguro?')){
                    console.log('Eliminar estudiante con ID:', id);
                    // Simulación de eliminación
                    estudiantes = estudiantes.filter(e => e.id !== parseInt(id));
                    cargarEstudiantes(); // Recargar la tabla
                }
            });
        });
    }

    function cargarGrados() {
        gradoSelect.innerHTML = '';
        grados.forEach(grado => {
            const option = document.createElement('option');
            option.value = grado;
            option.text = grado;
            gradoSelect.appendChild(option);
        });
    }

    function cargarDatosEstudiante(estudiante = null) {
        if (estudiante) {
            document.getElementById('nombre').value = estudiante.nombre;
            document.getElementById('apellido').value = estudiante.apellido;
            document.getElementById('grado').value = estudiante.grado;
            document.getElementById('correo').value = estudiante.correo;
            document.getElementById('telefono').value = estudiante.telefono;
            document.getElementById('estudianteId').value = estudiante.id;
        } else {
            formEstudiante.reset();
            document.getElementById('estudianteId').value = '';
        }
    }

    // Evento para guardar estudiante
    formEstudiante.addEventListener('submit', (event) => {
        event.preventDefault();
        const id = document.getElementById('estudianteId').value;
        const nuevoEstudiante = {
            id: id ? parseInt(id) : estudiantes.length + 1, // ID autoincremental simple
            nombre: document.getElementById('nombre').value,
            apellido: document.getElementById('apellido').value,
            grado: document.getElementById('grado').value,
            correo: document.getElementById('correo').value,
            telefono: document.getElementById('telefono').value,
            estado: 'Activo'
        };

        if (id) {
            // Editar estudiante existente
            const index = estudiantes.findIndex(e => e.id === parseInt(id));
            estudiantes[index] = nuevoEstudiante;
        } else {
            // Agregar nuevo estudiante
            estudiantes.push(nuevoEstudiante);
        }

        cargarEstudiantes();
        // Cierra el modal
        const modal = bootstrap.Modal.getInstance(document.getElementById('agregarEstudianteModal'));
        modal.hide();
    });

    // Evento para buscar estudiante
    buscarEstudianteBtn.addEventListener('click', () => {
        const textoBusqueda = buscarEstudianteInput.value.toLowerCase();
        const estudiantesFiltrados = estudiantes.filter(estudiante => {
            return estudiante.nombre.toLowerCase().includes(textoBusqueda) ||
                   estudiante.apellido.toLowerCase().includes(textoBusqueda) ||
                   estudiante.correo.toLowerCase().includes(textoBusqueda);
        });
        cargarEstudiantes(estudiantesFiltrados);
    });

    // Inicializar
    cargarEstudiantes();
    cargarGrados();
});