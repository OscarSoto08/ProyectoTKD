$(document).ready(function(){
    let inputSearch = $("#input_buscar_evento");

    let timeout;
    inputSearch.on("input", function(event){
        clearTimeout(timeout);
        timeout = setTimeout(function(){
            var texto = inputSearch.val();
            console.log(texto);
            if(texto == ''){
                location.reload();
            }

            $.ajax({
                url: 'ui/profile/admin/busqueda_evento.php',
                type: 'POST',
                dataType: 'JSON',
                data: {
                    texto: texto
                },
                success: function(response){
                    $("#content").html(response.data);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error("Error en la solicitud AJAX: ", textStatus, errorThrown);
                }
            });
        }, 500); // Espera 500 ms después de que el usuario deje de escribir
    });
});
