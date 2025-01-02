document.addEventListener('DOMContentLoaded', () => {
    // Datos de ejemplo (simulando la respuesta de una API)
    const estudiantesPorGrado = {
        'Cinturón Blanco': 10,
        'Cinturón Amarillo': 15,
        'Cinturón Verde': 20,
        'Cinturón Azul': 12,
        'Cinturón Rojo': 8,
        'Cinturón Negro': 5
    };

    const ingresosMensuales = {
        'Enero': 2500,
        'Febrero': 3200,
        'Marzo': 2800,
        'Abril': 4500,
        'Mayo': 3800,
        'Junio': 5000
    };

    const participacionEventos = {
        'Torneo Regional': 80,
        'Seminario de Arbitraje': 45,
        'Examen de Grado': 60
    };

    const nuevosEstudiantes = {
        'Enero': 12,
        'Febrero': 8,
        'Marzo': 15,
        'Abril': 10,
        'Mayo': 20,
        'Junio': 18
    }

    // Gráfico de Estudiantes por Grado
    const ctxEstudiantesGrado = document.getElementById('graficoEstudiantesGrado').getContext('2d');
    new Chart(ctxEstudiantesGrado, {
        type: 'bar',
        data: {labels: Object.keys(estudiantesPorGrado),
            datasets: [{
                label: 'Cantidad de Estudiantes',
                data: Object.values(estudiantesPorGrado),
                backgroundColor: [
                    'rgba(255, 99, 132, 0.5)',
                    'rgba(54, 162, 235, 0.5)',
                    'rgba(255, 206, 86, 0.5)',
                    'rgba(75, 192, 192, 0.5)',
                    'rgba(153, 102, 255, 0.5)',
                    'rgba(255, 159, 64, 0.5)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            plugins: {
                legend: {
                    display: false
                }
            }
        }
    });

    // Gráfico de Ingresos Mensuales
    const ctxIngresos = document.getElementById('graficoIngresos').getContext('2d');
    new Chart(ctxIngresos, {
        type: 'line',
        data: {
            labels: Object.keys(ingresosMensuales),
            datasets: [{
                label: 'Ingresos ($)',
                data: Object.values(ingresosMensuales),
                fill: false,
                borderColor: 'rgb(75, 192, 192)',
                tension: 0.1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    // Gráfico de Participación en Eventos
    const ctxParticipacion = document.getElementById('graficoParticipacion').getContext('2d');
    new Chart(ctxParticipacion, {
        type: 'doughnut',
        data: {
            labels: Object.keys(participacionEventos),
            datasets: [{
                label: 'Participantes',
                data: Object.values(participacionEventos),
                backgroundColor: [
                    'rgba(255, 99, 132, 0.5)',
                    'rgba(54, 162, 235, 0.5)',
                    'rgba(255, 206, 86, 0.5)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            plugins: {
                legend: {
                    position: 'bottom'
                }
            }
        }
    });

    // Gráfico de Nuevos Estudiantes por Mes
    const ctxNuevosEstudiantes = document.getElementById('graficoNuevosEstudiantes').getContext('2d');
    new Chart(ctxNuevosEstudiantes, {
        type: 'bar',
        data: {
            labels: Object.keys(nuevosEstudiantes),
            datasets: [{
                label: 'Nuevos Estudiantes',
                data: Object.values(nuevosEstudiantes),
                backgroundColor: 'rgba(153, 102, 255, 0.5)',
                borderColor: 'rgba(153, 102, 255, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            plugins: {
                legend: {
                    display: false
                }
            }
        }
    });
});