/*
distintos valores para action: 
1: Agregar un nuevo usuario
2: Eliminar un usuario
3: Editar un usuario
4: Consultar todos los usuarios
5: Consultar un solo usuario a partir de su id
*/
$(document).ready(function(){
const urlParams = new URLSearchParams(window.location.search);
let rolParam = urlParams.get('rol')
var idUsuario, action;
console.log(rolParam)
action = 4;
let tabla_usuarios;

switch (rolParam) {
    case '1':
        tabla_usuarios = $("#tabla_usuarios").DataTable({
            "ajax":{
                "url":"ui/profile/admin/pages/crud_usuario.php",
                "method": "POST",
                "data": {action: action, rolParam: rolParam},
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
        break;
    case '2':
        console.log(action)
        
        tabla_usuarios = $("#tabla_usuarios").DataTable({
            "ajax":{
                "url":"ui/profile/admin/pages/crud_usuario.php",
                "method": "POST",
                "data": {action: action, rolParam: rolParam},
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
                {"data": "grado"},
                {"defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm btnEditar' data-bs-toggle='modal' data-bs-target='#modalCRUD'><i class='material-icons'>edit</i></button><button class='btn btn-danger btn-sm btnBorrar'><i class='material-icons'>delete</i></button></div></div>"}
            ]
        });
        break;
    case '3':
        tabla_usuarios = $("#tabla_usuarios").DataTable({
            "ajax":{
                "url":"ui/profile/admin/pages/crud_usuario.php",
                "method": "POST",
                "data": {action: action, rolParam: rolParam},
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
        break;
    case '4':
        tabla_usuarios = $("#tabla_usuarios").DataTable({
            "ajax": {
                "url": "ui/profile/admin/pages/crud_usuario.php",
                "method": "post",
                "data": {action: action, rolParam: rolParam},
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
                {"data": "rol"},
                {"data": "grado"},
                {"defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm btnEditar' data-bs-toggle='modal' data-bs-target='#modalCRUD'><i class='material-icons'>edit</i></button><button class='btn btn-danger btn-sm btnBorrar'><i class='material-icons'>delete</i></button></div></div>"}
            ]
        });
        break;
}

$('#form_usuarios').submit((e)=>{
    e.preventDefault();
    nombre = $.trim($('#nombre').val()); 
    apellido = $.trim($('#apellido').val());
    correo = $.trim($('#correo').val());
    clave = $.trim($('#clave').val());
    telefono = $.trim($('#telefono').val());
    estado = $.trim($('#estado').val());
    fechaNac = $.trim($('#fechaNac').val());
    
    grado =  $.trim($('#grado').val()) ?? "";
    rol = $.trim($('#rol').val()) ?? "";



    console.log("id del usuario: "+ idUsuario); 
    console.log("nombre del usuario: "+  nombre);
    console.log("accion: "+ action);
    console.log("rol del usuario recibido por GET: " + rolParam);
    console.log("Grado: " + grado)
    console.log("Rol: " + rol)
    $.ajax({
        url: 'ui/profile/admin/pages/crud_usuario.php',
        type: 'POST',
        dataType: 'JSON',
        data: {
            idUsuario: idUsuario, nombre: nombre, apellido: apellido, correo: correo, clave: clave, telefono: telefono, estado: estado, fechaNac: fechaNac, action: action, grado: grado, rol: rol, rolParam: rolParam
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
    
    if(rolParam == '2' || rolParam == '4'){
        $("#grado-section").css("display", "block");
        $('#grado-section option').prop('selected', false);  // Deselecciona todas las opciones
        $('#grado-section option:first').prop('selected', true);  // Selecciona el primer option

    }
    if(rolParam == '4'){
        $('#rol-section option').prop('selected', false);  // Deselecciona todas las opciones
        $("#rol-section").css("display", "block");  
        $('#rol-section option:first').prop('selected', true);  // Selecciona el primer option
    }
    action = 1;  
    console.log("accion desde el evento btn nuevo: " + action)
});

$("#rol").change(function() {
    
    var valorSeleccionado = $(this).val();
    if (valorSeleccionado == 'profesor') {
        $("#grado-section").css("display", "none");
    }
    if(valorSeleccionado == 'estudiante'){
        $("#grado-section").css("display", "block");
        // Aqui se agrega el atributo selected al blanco
        $('#grado-section option').prop('selected', false);  // Deselecciona todas las opciones
        $('#grado-section option:first').prop('selected', true);  // Selecciona el primer option
    }
});


$(document).on("click", ".btnBorrar", function(){
    fila = $(this).closest("tr");
    idUsuario = parseInt(fila.find("td:eq(0)").text());
    action = 2;
    console.log("el id del usuario a eliminar es: " + idUsuario)
    var respuesta = confirm("¿Está seguro que desea eliminar el registro: " + idUsuario + "?");
    if(respuesta){
        $.ajax({
            url: "ui/profile/admin/pages/crud_usuario.php",
            type: 'POST',
            dataType: 'JSON',
            data: {idUsuario: idUsuario, action: action, rolParam: rolParam},
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
    $(".modal-title").text("Editar usuario");
    $(".modal-title").css("color", "white");
    $('#modalCRUD').modal('show');	
    // Validacion de que si el usuario es estudiante o usuario temporal entonces se muestra el input de grado
    // Adicionalmente al usuario temporal meterle el input de rol

    fila = $(this).closest("tr");	        
    idUsuario = parseInt(fila.find('td:eq(0)').text()); //capturo el id y hago una busqueda para autocompletar los campos automaticamente 
    console.log(idUsuario)
    if(rolParam == 2 || rolParam == 4){$("#grado-section").css("display", "block")}
    if(rolParam == 4) $("#rol-section").css("display", "block");
    $.ajax({
        url: 'ui/profile/admin/pages/crud_usuario.php',
        type: 'POST',
        dataType: 'JSON',
        data: {action: 5, idUsuario: idUsuario, rolParam: rolParam},
        success: (data)=>{
            $("#nombre").val(data.nombre);
            $("#apellido").val(data.apellido);
            $("#correo").val(data.correo);
            $("#clave").val('');
            $("#telefono").val(data.telefono);
            $("#estado").val(data.estado);
            $("#fechaNac").val(data.fechaNac);
            $("#clave").val(data.clave)
            if(rolParam == 2 || rolParam == 4) $("#grado").val(data.grado);
            if(rolParam == 4) $("#rol").val(data.rol);

            if(data.rol == 2){
                $("#grado-section").css("display", "none");
            }
        }
    });
    action = 3;
});
});