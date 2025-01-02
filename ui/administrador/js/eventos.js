document.addEventListener('DOMContentLoaded', () => {
    // ************************
    // *** Gestión de Eventos ***
    // ************************

    const tablaEventos = document.getElementById('tablaEventos');
    const formEvento = document.getElementById('formEvento');
    const buscarEventoInput = document.getElementById('buscarEventoInput');
    const buscarEventoBtn = document.getElementById('buscarEventoBtn');
    const eventoCiudadSelect = document.getElementById('eventoCiudad');

    let eventos = [
        // Datos de ejemplo para eventos
        { id: 1, nombre: 'Torneo Regional', descripcion: 'Torneo para cinturones de color', fechaInicio: '2023-12-20', fechaFin: '2023-12-22', ciudad: 'Ciudad Ejemplo', precio: 25.00, estado: 'Borrador' },
        // ...
    ];

    const ciudades = [
        'Ciudad Ejemplo',
        'Otra Ciudad',
        'Una Ciudad Más'
        // ...
    ];
    function cargarCiudades() {
        eventoCiudadSelect.innerHTML = '';
        ciudades.forEach(ciudad => {
            const option = document.createElement('option');
            option.value = ciudad;
            option.text = ciudad;
            eventoCiudadSelect.appendChild(option);
        });
    }
    function cargarEventos(eventosData = eventos) {
        tablaEventos.innerHTML = '';
        eventosData.forEach(evento => {
            const fila = document.createElement('tr');
            fila.innerHTML = `
                <td>${evento.id}</td>
                <td>${evento.nombre}</td>
                <td>${evento.fechaInicio}</td>
                <td>${evento.fechaFin}</td>
                <td>${evento.ciudad}</td>
                <td>$${evento.precio.toFixed(2)}</td>
                <td>${evento.estado}</td>
                <td>
                    <button class="btn btn-sm btn-primary editar-evento" data-id="${evento.id}"><i class="fas fa-edit"></i></button>
                    <button class="btn btn-sm btn-danger eliminar-evento" data-id="${evento.id}"><i class="fas fa-trash"></i></button>
                </td>
            `;
            tablaEventos.appendChild(fila);
        });

        // Eventos para editar y eliminar Eventos
        const botonesEditar = document.querySelectorAll('.editar-evento');
        botonesEditar.forEach(boton => {
            boton.addEventListener('click', () => {
                const id = boton.dataset.id;
                const evento = eventos.find(e => e.id === parseInt(id));
                cargarDatosEvento(evento);
                const modal = new bootstrap.Modal(document.getElementById('agregarEventoModal'));
                modal.show();
            });
        });

        const botonesEliminar = document.querySelectorAll('.eliminar-evento');
        botonesEliminar.forEach(boton => {
            boton.addEventListener('click', () => {
                const id = boton.dataset.id;
                if (confirm('¿Está seguro de que desea eliminar este evento?')) {
                    eventos = eventos.filter(e => e.id !== parseInt(id));
                    cargarEventos();
                }
            });
        });
    }

    function cargarDatosEvento(evento = null) {
        if (evento) {
            document.getElementById('eventoNombre').value = evento.nombre;
            document.getElementById('eventoDescripcion').value = evento.descripcion;
            document.getElementById('eventoFechaInicio').value = evento.fechaInicio;
            document.getElementById('eventoFechaFin').value = evento.fechaFin;
            document.getElementById('eventoCiudad').value = evento.ciudad;
            document.getElementById('eventoPrecio').value = evento.precio;
            document.getElementById('eventoEstado').value = evento.estado;
            document.getElementById('eventoId').value = evento.id;
        } else {
            formEvento.reset();
            document.getElementById('eventoId').value = '';
        }
    }

    formEvento.addEventListener('submit', (event) => {
        event.preventDefault();
        const id = document.getElementById('eventoId').value;
        const nuevoEvento = {
            id: id ? parseInt(id) : eventos.length + 1,
            nombre: document.getElementById('eventoNombre').value,
            descripcion: document.getElementById('eventoDescripcion').value,
            fechaInicio: document.getElementById('eventoFechaInicio').value,
            fechaFin: document.getElementById('eventoFechaFin').value,
            ciudad: document.getElementById('eventoCiudad').value,
            precio: parseFloat(document.getElementById('eventoPrecio').value),
            estado: document.getElementById('eventoEstado').value
        };

        if (id) {
            const index = eventos.findIndex(e => e.id === parseInt(id));
            eventos[index] = nuevoEvento;
        } else {
            eventos.push(nuevoEvento);
        }

        cargarEventos();
        const modal = bootstrap.Modal.getInstance(document.getElementById('agregarEventoModal'));
        modal.hide();
    });

    buscarEventoBtn.addEventListener('click', () => {
        const textoBusqueda = buscarEventoInput.value.toLowerCase();
        const eventosFiltrados = eventos.filter(evento => {
            return evento.nombre.toLowerCase().includes(textoBusqueda) ||
                   evento.descripcion.toLowerCase().includes(textoBusqueda) ||
                   evento.ciudad.toLowerCase().includes(textoBusqueda);
        });
        cargarEventos(eventosFiltrados);
    });

    cargarEventos();
    cargarCiudades();
});