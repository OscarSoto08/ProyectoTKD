// Asegúrate de que este script se cargue después de que el DOM esté completamente cargado
document.addEventListener('DOMContentLoaded', () => {
    // Selecciona todos los elementos con la clase .dropdown-item

    //Primero que se cargue la info general
    fetch('ui/inicio/pages/brief-info.php')
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Red error'); // Lanza un error si la respuesta no es exitosa
                    }
                    return response.text(); // Retorna la respuesta como texto
                })
                .then(data => {
                    document.getElementById('content').innerHTML = data; // Carga el contenido en el elemento con id "content"
                })
                .catch(error => {
                    console.error('Error al cargar la página:', error); // Muestra un error en la consola
                    document.getElementById('content').innerHTML = '<p>Error al cargar la página.</p>'; // Muestra un mensaje de error en el contenido
                });


    document.querySelectorAll('.nav-link').forEach(item => {
        // Agrega un evento de clic a cada elemento
        item.addEventListener('click', function(e) {
            // e.preventDefault(); // Evita el comportamiento predeterminado del enlace
            const page = this.getAttribute('data-page'); // Obtiene la URL de la página desde el atributo data-page
            console.log(page)
            // Lógica para cargar la página vía AJAX
            fetch(page)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Red error'); // Lanza un error si la respuesta no es exitosa
                    }
                    return response.text(); // Retorna la respuesta como texto
                })
                .then(data => {
                    document.getElementById('content').innerHTML = data; // Carga el contenido en el elemento con id "content"
                })
                .catch(error => {
                    console.error('Error al cargar la página:', error); // Muestra un error en la consola
                    document.getElementById('content').innerHTML = '<p>Error al cargar la página.</p>'; // Muestra un mensaje de error en el contenido
                });
        });
    });
});
