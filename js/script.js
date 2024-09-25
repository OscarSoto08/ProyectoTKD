$(document).ready(function() {
    // Manejar el clic en los enlaces dentro de .offcanvas-body
    $('.offcanvas-body a').on('click', function(event) {
        event.preventDefault(); // Prevenir la acción por defecto del enlace

        // Obtener el valor del atributo data-page del enlace clicado
        var page = $(this).data('page');

        // Verificar si el atributo data-page está definido
        if (page) {
            // Mostrar un spinner de carga antes de realizar la solicitud
            $('#content').html('<div class="spinner-border text-primary" role="status"><span class="visually-hidden">Cargando...</span></div>');

            // Configurar un timeout para manejar tiempos de espera largos
            let timeout = setTimeout(function() {
                $('#content').html('<p>El contenido está tardando más de lo esperado en cargar. Por favor, espera o intenta nuevamente más tarde.</p>');
            }, 5000); // 5000 ms = 5 segundos

            // Realizar la solicitud AJAX
            $.ajax({
                url: page,
                type: 'GET',
                timeout: 10000, // Tiempo máximo de espera de 10 segundos para la solicitud
                success: function(data) {
                    clearTimeout(timeout); // Cancelar el timeout si la solicitud tiene éxito
                    $('#content').empty(); // Vaciar el contenido actual
                    $('#content').html(data); // Insertar el nuevo contenido
                },
                error: function(xhr, status, error) {
                    clearTimeout(timeout); // Cancelar el timeout si ocurre un error
                    console.error('Error:', error);
                    $('#content').empty(); // Vaciar el contenido actual
                    $('#content').html('<p>Error al cargar el contenido. Inténtalo nuevamente más tarde.</p>'); // Mostrar mensaje de error
                }
            });
        } else {
            console.error('El atributo data-page no está definido.');
        }
    });
});
