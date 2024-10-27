/*
distintos valores para action: 
1: Agregar un nuevo profesor
2: Eliminar un profesor
3: Editar un profesor
4: Consultar todos los profesores
5: Consultar un solo profesor a partir de su id
*/

$(document).ready(function(){
var idUser, action;
action = 4;
tablaProfesores = $("#tablaProfesores").DataTable({
        "ajax":{
            "url":"crudProfesor.php",
            "method": "POST",
            "data": {action: action},
            "dataSrc": ""
        },
        "columns": [
            {"data": "idProfesor"},
            {"data": "nombre"},
            {"data": "apellido"},
            {"data": "correo"},
            {"data": "fechaNac"},
            {"data": "estado"},
            {"data": "telefono"},
            {"defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm btnEditar' data-bs-toggle='modal' data-bs-target='#modalCRUD'><i class='material-icons'>edit</i></button><button class='btn btn-danger btn-sm btnBorrar'><i class='material-icons'>delete</i></button></div></div>"}
        ]//,
        // "createdRow": function(row, data, dataIndex) {
        //     $(row).find('td').each(function(index) {
        //         var columnName = tablaProfesores.column(index).dataSrc(); // Obtener el nombre de la columna
        //         $(this).attr('data-column', columnName); // Agregar el atributo
        //     });
        // }
    });

    // Actualiza el DataTable en caso de que cambie el tamaño de la ventana
    // $(window).on('resize', function() {
    //     tablaProfesores.rows().every(function() {
    //         var row = this;
    //         row.nodes().each(function(td, index) {
    //             var columnName = tablaProfesores.column(index).dataSrc();
    //             $(td).attr('data-column', columnName); // Agregar el atributo nuevamente
    //         });
    //     });
    // });
$('#formUsuarios').submit((e)=>{
    e.preventDefault();
    nombre = $.trim($('#nombre').val()); 
    apellido = $.trim($('#apellido').val());
    correo = $.trim($('#correo').val());
    clave = $.trim($('#clave').val());
    telefono = $.trim($('#telefono').val());
    estado = $.trim($('#estado').val());
    fechaNac = $.trim($('#fechaNac').val());
    console.log("id del usuario: "+ idUser); // Para depuración
    console.log("nombre del usuario: "+  nombre);
    console.log("accion: "+ action);
    $.ajax({
        url: 'crudProfesor.php',
        type: 'POST',
        dataType: 'JSON',
        data: {
            idProfesor: idUser, nombre: nombre, apellido: apellido, correo: correo, clave: clave, telefono: telefono, estado: estado, fechaNac: fechaNac, action: action
        },
        success: function(data){
            console.log(data);
            tablaProfesores.ajax.reload(null, false);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error("Error en la solicitud AJAX: ", textStatus, errorThrown);
        }
    });
    $('#modalCRUD').modal('hide');		
}); 
    //para limpiar los campos antes de dar de Alta una Persona
$(document).on("click", "#btnNuevo", function(){  
    idUser=null;
    $("#formUsuarios").trigger("reset");
    $(".modal-header").css( "background-color", "#17a2b8");
    $(".modal-header").css( "color", "white" );
    $(".modal-title").text("Alta de Usuario");
    $('#modalCRUD').modal('show');	   
    
    action = 1;  
    console.log("accion desde el evento btn nuevo: " + action)
});

$(document).on("click", ".btnBorrar", function(){
    fila = $(this).closest("tr");
    idUser = parseInt(fila.find("td:eq(0)").text());
    action = 2;
    console.log("el id del usuario a eliminar es: " + idUser)
    var respuesta = confirm("¿Está seguro que desea eliminar el registro: " + idUser + "?");
    if(respuesta){
        $.ajax({
            url: "crudProfesor.php",
            type: 'POST',
            dataType: 'JSON',
            data: {idProfesor: idUser, action: action},
            success: function(data){
                console.log(data);
                tablaProfesores.ajax.reload(null, false);
            },error: function(jqXHR, textStatus, errorThrown) {
                console.error("Error en la solicitud AJAX: ", textStatus, errorThrown);
            }
        })
    }
})

     	
$(document).on("click", ".btnEditar", function(){
    fila = $(this).closest("tr");	        
    idUser = parseInt(fila.find('td:eq(0)').text()); //capturo el ID		     
    
    console.log(action); // Para depuración
    $.ajax({
        url: 'crudProfesor.php',
        type: 'POST',
        dataType: 'JSON',
        data: {action: 5, idProfesor: idUser},
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