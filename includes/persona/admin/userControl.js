/*
distintos valores para action: 
1: Agregar un nuevo usuario
2: Eliminar un usuario
3: Editar un usuario
4: Consultar todos los usuarios
5: Consultar un solo usuario a partir de su id
*/

$(document).ready(function(){
var idUsuario, action;
action = 4;
tabla_usuarios = $("#tabla_usuarios").DataTable({
        "ajax":{
            "url":"crud_usuario.php",
            "method": "POST",
            "data": {action: action},
            "dataSrc": ""
        },
        "columns": [
            {"data": "idUsuario"},
            {"data": "nombre"},
            {"data": "apellido"},
            {"data": "correo"},
            {"data": "fechaNac"},
            {"data": "estado"},
            {"data": "telefono"},
            {"defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm btnEditar' data-bs-toggle='modal' data-bs-target='#modalCRUD'><i class='material-icons'>edit</i></button><button class='btn btn-danger btn-sm btnBorrar'><i class='material-icons'>delete</i></button></div></div>"}
        ]
    });
$('#form_usuarios').submit((e)=>{
    e.preventDefault();
    nombre = $.trim($('#nombre').val()); 
    apellido = $.trim($('#apellido').val());
    correo = $.trim($('#correo').val());
    clave = $.trim($('#clave').val());
    telefono = $.trim($('#telefono').val());
    estado = $.trim($('#estado').val());
    fechaNac = $.trim($('#fechaNac').val());
    console.log("id del usuario: "+ idUsuario); // Para depuración
    console.log("nombre del usuario: "+  nombre);
    console.log("accion: "+ action);
    $.ajax({
        url: 'crud_usuario.php',
        type: 'POST',
        dataType: 'JSON',
        data: {
            idUsuario: idUsuario, nombre: nombre, apellido: apellido, correo: correo, clave: clave, telefono: telefono, estado: estado, fechaNac: fechaNac, action: action
        },
        success: function(data){
            console.log(data);
            tabla_usuarios.ajax.reload(null, false);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error("Error en la solicitud AJAX: ", textStatus, errorThrown);
        }
    });
    $('#modalCRUD').modal('hide');		
}); 
    //para limpiar los campos antes de dar de Alta una Persona
$(document).on("click", "#btnNuevo", function(){  
    idUsuario=null;
    $("#form_usuarios").trigger("reset");
    $(".modal-header").css( "color", "white" );
    $(".modal-title").text("Nuevo usuario");
    $('#modalCRUD').modal('show');	   
    
    action = 1;  
    console.log("accion desde el evento btn nuevo: " + action)
});

$(document).on("click", ".btnBorrar", function(){
    fila = $(this).closest("tr");
    idUsuario = parseInt(fila.find("td:eq(0)").text());
    action = 2;
    console.log("el id del usuario a eliminar es: " + idUsuario)
    var respuesta = confirm("¿Está seguro que desea eliminar el registro: " + idUsuario + "?");
    if(respuesta){
        $.ajax({
            url: "crud_usuario.php",
            type: 'POST',
            dataType: 'JSON',
            data: {idUsuario: idUsuario, action: action},
            success: function(data){
                console.log(data);
                tabla_usuarios.ajax.reload(null, false);
            },error: function(jqXHR, textStatus, errorThrown) {
                console.error("Error en la solicitud AJAX: ", textStatus, errorThrown);
            }
        })
    }
})

     	
$(document).on("click", ".btnEditar", function(){
    fila = $(this).closest("tr");	        
    idUsuario = parseInt(fila.find('td:eq(0)').text()); //capturo el ID		     
    
    console.log(action); // Para depuración
    $.ajax({
        url: 'crud_usuario.php',
        type: 'POST',
        dataType: 'JSON',
        data: {action: 5, idUsuario: idUsuario},
        success: (data)=>{
            $("#nombre").val(data.nombre);
            $("#apellido").val(data.apellido);
            $("#correo").val(data.correo);
            $("#clave").val(data.clave);
            $("#telefono").val(data.telefono);
            $("#estado").val(data.estado);
            $("#fechaNac").val(data.fechaNac);
            $(".modal-header").css("background-color", "#007bff");
            $(".modal-header").css("color", "white" );
            $(".modal-title").text("Editar Usuario");		
            $('#modalCRUD').modal('show');	
        }
    });
    action = 3;
    console.log(action)
    	   
});
});