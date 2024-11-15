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


    $(document).on("click", ".btn_modal_evento", function(){
        // Usamos .closest() para encontrar el ancestro h1 que contiene el ID del evento.
        var id = $(this).closest('.col-md-3').find('.eventoid').text(); //El texto de h1 obtenido del ancestro
        $('.modal-title').html('Editar evento id: '+ id)
        $(".modal-title").css("color", "white");
        $(".modal-header").css("background-color", "DarkCyan"); 

        //Cada elemento que tenga una clase que termine en ev quiere decir que pertenece al container de evento y no al modal
        $("#fecha_inicio").val($(this).closest('.col-md-3').find('.fecha_inicio_ev').text())
    })
    


    $(document).on("click", "#btn_modal_evento", function(){

    })
});
