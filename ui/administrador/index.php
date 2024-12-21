<?php

require 'includes.php';
$header = new Header(css:["css/profile.css","css/navbar.css", "css/sidebar.css", "css/acciones.css", "css/options.css"], js:[]);
$header -> render();

$navbar = new Navbar(nav_items:[
  //?Centro
  new Navitem("centro", ["<ul class='ul d-flex flex-row overflow-hidden p-0'>
    <li class='li'>
      <button class='button'><p class='p'>Cursos</p></button>
    </li>
  ", "<li class='li'>
      <button class='button'><p class='p'>Eventos</p></button>
    </li>", "<li class='li'>
      <button class='button'><p class='p'>Eventos</p></button>
    </li> </ul>"]),
  new Navitem(posicion: "derecha", contenido: ["<i style='font-size: 30px' class='fa-solid fa-arrow-right-from-bracket'></i>"], getParams: ["cs" => base64_encode("true")])
], home_url: "ui/administrador/index.php");
$navbar -> render();

?>
<div class="d-flex flex-wrap row">

  <div class="sidebar col-lg-4">

  <div class="mi-perfil row mb-3 card infos">
    <div class="image mx-auto mb-2"><img style="width: 7rem; height: 7rem;" src="<?php echo $administrador->getImagen() ?? 'img/tkd_combate.webp' ?>"/></div>
    <div class="info">
      <div>
        <p id="mi_nombre"><?php echo $administrador -> getNombre() ?></p>
        <p id="mi_correo"><?php echo $administrador -> getCorreo() ?></p>
        <p id="mi_fecha_nacimiento"><?php echo $administrador -> getFechaNacimiento() ?></p>
        <p id="mi_telefono"><?php echo $administrador -> getTelefono() ?></p>
      </div>
      <?php 
        $btn = new Button("button",["btn", "fill"], "1", "editar_mi_perfil","Editar mi perfil");
        $btn-> render();
      ?>
    </div>
  </div>

    <div class="text-center card" style="border-radius: 10px; border: 2px solid white; color:aliceblue;">
      <h6 class="mb-1">Porcentaje de cursos con una tasa de aprobación mayor al 80%</h6><canvas id="myChart1"></canvas></div>
  </div>

  <div class="contenido col-lg-8">
    <div class="row">
    <!-- Columna 1 -->
      <div class="col-lg-6 d-flex flex-column">
        
        <div class="row d-flex" style="justify-content: space-evenly;">

        <!-- Search -->
        <div class="col group mb-4">
          <svg viewBox="0 0 24 24" aria-hidden="true" class="search-icon">
            <g>
              <path
                d="M21.53 20.47l-3.66-3.66C19.195 15.24 20 13.214 20 11c0-4.97-4.03-9-9-9s-9 4.03-9 9 4.03 9 9 9c2.215 0 4.24-.804 5.808-2.13l3.66 3.66c.147.146.34.22.53.22s.385-.073.53-.22c.295-.293.295-.767.002-1.06zM3.5 11c0-4.135 3.365-7.5 7.5-7.5s7.5 3.365 7.5 7.5-3.365 7.5-7.5 7.5-7.5-3.365-7.5-7.5z"
              ></path>
            </g>
          </svg>

          <input
            id="query"
            class="input"
            type="search"
            placeholder="Buscar..."
            name="searchbar"
          />
        </div>
        <!-- Filter -->
        <div class="col group mb-4">
          
        <div class='radio-input'>
            <label class='label'>
              <input type='radio' id='value-1' class="radio" name='value-radio' value='2' />
              <p class='text'>Estudiantes</p>
            </label>
            <label class='label'>
              <input type='radio' id='value-2' class="radio" name='value-radio' value='3' />
              <p class='text'>Profesores</p>
            </label>
            <label class='label'>
              <input type='radio' id='value-3' class="radio" name='value-radio' value='1' />
              <p class='text'>Administradores</p>
            </label>
      </div>

        
        </div>

        </div>


        <!-- Dynamic Data -->
        <div class="row">
          <div id="dinamic_data" class="cards mb-3" style="width: 100%; display: flex; flex-direction: column; overflow-y: scroll; max-height: 500px;">
              <?php 
              $i = 0;
              foreach(Usuario::consultarTodos() as $usuario){
                  $i++;
                  $color = match ($usuario->getTipoUsuario()) {
                    '1' => 'blue',
                    '2' => 'green',
                    '3' => 'red',
                  };

                  $tipo_usuario = match ($usuario->getTipoUsuario()) {
                    '1' => 'Administrador',
                    '2' => 'Estudiante',
                    '3' => 'Profesor',
                  };

                  echo "<div class='card-item card $color' style='width: 800px;'>
                          <p hidden class='id'>{$usuario->getIdUsuario()}</p>
                          <p class='tip'>{$usuario -> getNombre()} {$usuario->getApellido()}</p>
                          <p class='second-text' style='font-size: 15px'>{$tipo_usuario}</p>
                      </div>";
              }
              ?>
          </div>
        </div>

      </div>

    <!-- Columna 2 -->
      <div class="col-lg-6 d-flex flex-column">
      <div class="container">
        <!-- Informacion -->
        <div id="info" class="row text-center" style="height: 400px; display: none;">
        
        <div class="card" style="border: 0.5px solid white; margin-bottom: 15px;">
          
        <div class="mx-auto mb-4"><img style="width: 60%;" src="<?php echo $administrador->getImagen() ?? 'img/tkd_combate.webp' ?>"/></div>
        
        <p hidden>Id: <span id="id_show"></span></p>
        <p>Nombre: <span id="nombre_show"></span></p>
        <p>Apellido: <span id="apellido_show"></span></p>
        <p>Correo: <span id="correo_show"></span></p>
        <p>Estado: <span id="estado_show"></span></p>
        <p>Fecha nacimiento: <span id="fecha_nacimiento_show"></span></p>
        <p>Telefono: <span id="telefono_show"></span></p>
        
        
        
        </div>

        
        </div>
        <!-- Acciones -->
        <div id="acciones" class="my-5 row text-center">
            <div class="col">
              <?php 
                $btn = new Button("button",["btn", "fill"], "1", "editar","Editar");
                $btn-> render();
              ?>
            </div>
            <div class="col">
            <?php 
                $btn = new Button("button",["btn", "fill"], "2", "ver_todos","Ver todos  ");
                $btn-> render();
              ?>
            </div>
            <div class="col">
            <?php 
                $btn = new Button("button",["btn", "fill"], "2", "eliminar","Eliminar");
                $btn-> render();
              ?>
            </div>
          </div>

        <div id="chart-2">
          <canvas class="mx-auto" style="width: 85%; min-width: 400px; " id="myChart2"></canvas><p class="mt-3"></p>  
        </div>
      </div>
      </div>
    </div>
  </div>

</div>


<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
      </div>
    </div>
  </div>
</div>

<!-- TOAST -->

<div class="toast-container position-fixed bottom-0 end-0 p-3">
<div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
  <div class="toast-header">
    <img src="img/image.png" style="max-width: 30px; max-height: 30px;" class="rounded me-2" alt="...">
    <strong class="me-auto">Advertencia</strong>
    <small class="text-muted">lta kopulso</small>
    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
  </div>
  <div class="toast-body">
  </div>
</div>
</div>



<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- CHART JS -->
<script>
  const ctx1 = document.getElementById('myChart1');
  const ctx2 = document.getElementById('myChart2');
  Chart.defaults.color = '#FFF';
  Chart.defaults.backgroundColor = '#FFF';
  const data1 = {
    labels: ["january", "february", "march", "april", "may", "june", "july"],
    datasets: [{
      label: 'My First Dataset',
      data: [65, 59, 80, 81, 56, 55, 40],
      backgroundColor: [
        'rgba(255, 99, 132, 0.2)',
        'rgba(255, 159, 64, 0.2)',
        'rgba(255, 205, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(153, 102, 255, 0.2)',
        'rgba(201, 203, 207, 0.2)'
      ],
      borderColor: [
        'rgb(255, 99, 132)',
        'rgb(255, 159, 64)',
        'rgb(255, 205, 86)',
        'rgb(75, 192, 192)',
        'rgb(54, 162, 235)',
        'rgb(153, 102, 255)',
        'rgb(201, 203, 207)'
      ],
      borderWidth: 1
    }]
  };
  const data = {
  labels: [
    'Poomsae',
    'Combate',
    'Terminología',
    'Defensa Personal'
  ],
  datasets: [{
    label: 'My First Dataset',
    data: [300, 50, 100, 500],
    backgroundColor: [
      '#6A0DAD',
      '#2ECC71',
      '#FF5E5B',
      '#003366'
    ],
    color: '#000',
    hoverOffset: 4
  }]
};
  new Chart(ctx1, {
    type: 'doughnut',
    data: data,
    options: {
      animations: {
        tension: {
          duration: 1000,
          easing: 'linear',
          from: 1,
          to: 0,
          loop: true
        }
      },
      scales: {
        y: { // defining min and max so hiding the dataset does not change scale range
          min: 0,
          max: 100
        }
      },
      plugins: {
          title: {
              display: true,
              text: '',
              padding: {
                    top: 10,
                    bottom: 30
                }
          }
      }
    }
  });

  new Chart(ctx2, {
    type: 'bar',
    data: data1,
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>


<!-- Para usuarios -->
<script>
//? 1: Consultar por id
//? 2: Editar
//? 3: Eliminar
//? 4: Crear

  //? Este script sera para ver la informacion de cada evento, usuario o curso
$(document).ready(function(){

  let action = 0;

  $(document).on("click", ".card-item", function(){
    carta = $(this).closest(".card-item")
    id = carta.find(".id").text()
    action ='1'
    tipo_usuario = carta.find("p:eq(2)").text()
    ruta = 'ui/administrador/user_control.php'

    $.ajax({
      url: "indexAjax.php",
      type: "POST",
      data: {id: id, action: action, tipo_usuario: tipo_usuario, ruta: ruta},
      dataType: 'json',
      success: function(response){
       console.log(response)
       $("#info").css("display", "block")
       $("#id_show").html(response.idUsuario)
       $("#nombre_show").html(response.nombre)
       $("#apellido_show").html(response.apellido)
       $("#correo_show").html(response.correo)
       $("#estado_show").html(response.estado)
       $("#fecha_nacimiento_show").html(response.fecha_nacimiento)
       $("#telefono_show").html(response.telefono)
      },
      error: function(xhr, status, error) {
        console.error('Hubo un error: ', error);
    }
    })
  })

  $(document).on("click", ".radio", function(){
    valor = $(this).val()
    const color = {
      "1": "blue",
      "2": "green",
      "3": "red"
    }[valor];

    const tipo_usuario = {
      "1": "Administrador",
      "2": "Estudiante",
      "3": "Profesor"
    }[valor];
    $.ajax({
      url: 'indexAjax.php',
      type: 'POST',
      data: {
        ruta: 'ui/administrador/user_control.php', 
        action: 2,
        tipo_usuario: valor
      },
      dataType: 'JSON',
      success: function(response){
        let cadena = "";
        console.log(response)
        response.forEach(item => {
          cadena += `<div class='card-item card ${color}' style='width: 800px;'><p hidden class='id'>${item.idUsuario}</p><p class='tip'>${item.nombre}  ${item.apellido}</p><p class='second-text' style='font-size: 15px'>${tipo_usuario}</p></div>`;
        });
        $("#dinamic_data").html(cadena);
      },
      error: function(xhr, status, error){
        console.error('Hubo un error: ', error)
      }
    })
  });

  $(document).on("click", "#ver_todos", function(){
    $.ajax({
      url: 'indexAjax.php',
      type: 'POST',
      data: {
        ruta: 'ui/administrador/user_control.php', 
        action:3 
      },
      dataType: 'JSON',
      success: function(response){
        let cadena = "";
        response.forEach(item => {
          color = {
            "1": "blue",
            "2": "green",
            "3": "red"
          }[item["tipo_usuario"]];
          tipo_usuario = {
            "1": "Administrador",
            "2": "Estudiante",
            "3": "Profesor"
          }[item["tipo_usuario"]];
          cadena += `<div class='card-item card ${color}' style='width: 800px;'><p hidden class='id'>${item.idUsuario}</p><p class='tip'>${item.nombre}  ${item.apellido}</p><p class='second-text' style='font-size: 15px'>${tipo_usuario}</p></div>`;
        });
        $("#dinamic_data").html(cadena);
        $('input[type="radio"]').prop('checked', false);
      },
      error: function(xhr, status, error){
        console.error('Hubo un error: ', error)
      }
    })
  })

  $(document).on("click", "#editar", function () {
  if ($("#nombre_show").text() == "") {
    $(".toast-header").css("background-color", "var(--bs-red)");
    $(".toast-body").html(
      "Por favor seleccione un usuario para actualizar su información"
    );
    new bootstrap.Toast($("#liveToast")).show();
  } else {
    $("#staticBackdrop").modal("show");
    $(".modal-title").text("Editar Usuario");
    $(".modal-title").css("color", "white");
    $(".modal-header").css("background-color", "var(--bs-blue)");

    // Realizar la solicitud AJAX para cargar el formulario
    $.ajax({
      url: "indexAjax.php",
      type: "POST",
      data: { ruta: "ui/administrador/pages/form_users.php" },
      dataType: "text",
      success: function (response) {
        // Asignar el contenido del formulario al modal cuando AJAX termine
        $(".modal-body").html(response);

        // Llenar los campos del formulario con los valores actuales
        $("#id_form").val($("#id_show").text())
        $("#nombre_form").val($("#nombre_show").text());
        $("#apellido_form").val($("#apellido_show").text());
        $("#correo_form").val($("#correo_show").text());
        $("#estado_form").val($("#estado_show").text());
        $("#fecha_nacimiento_form").val($("#fecha_nacimiento_show").text());
        $("#telefono_form").val($("#telefono_show").text());
        $("#btn_form").text("Actualizar");
      },
      error: function (xhr, status, error) {
        console.error("Error al cargar el formulario:", error);
      },
    });
  }
});

  $(document).on("submit", "#form_editar", function(event){
    event.preventDefault();
    id = $("#id_form").val()
    nombre = $("#nombre_form").val();
    apellido = $("#apellido_form").val();
    correo = $("#correo_form").val();
    estado = $("#estado_form").val();
    fecha_nacimiento = $("#fecha_nacimiento_form").val();
    telefono = $("#telefono_form").val();

    $.ajax({
      url: "indexAjax.php",
      type: "POST",
      dataType: "JSON",
      data: {
        ruta: "ui/administrador/user_control.php", 
        action: "4",
        id: id, 
        nombre: nombre,
        apellido: apellido,
        correo: correo,
        estado: estado,
        fecha_nacimiento:fecha_nacimiento,
        telefono:telefono
      },
      success: function(response){
        if(response == "success"){
          $("#nombre_show").text(nombre)
          $("#apellido_show").text(apellido)
          $("#correo_show").text(correo)
          $("#estado_show").text(estado)
          $("#fecha_nacimiento_show").text(fecha_nacimiento)
          $("#telefono_show").text(telefono)

          if(id == <?php echo $administrador->getIdUsuario();?>){
            $("#mi_nombre").text(nombre)
            $("#mi_correo").text(correo)
            $("#mi_fecha_nacimiento").text(fecha_nacimiento)
            $("#mi_telefono").text(telefono)
          }

          carta = $(`p.id:contains("${id}")`).parent()
          carta.find("p.tip").first().text(nombre + " " + apellido);          

        }else{
          $(".toast-header").css("background-color", "var(--bs-danger )");
          $(".toast-body").html(
            "Ha ocurrido un error al actualizar los datos"
          );
          new bootstrap.Toast($("#liveToast")).show();
        }
      },
      error: function(xhr, status, error){
        console.error(error)
        $(".toast-header").css("background-color", "var(--bs-danger )");
          $(".toast-body").html(
            "Ha ocurrido un error al procesar la respuesta del servidor"
          );
          new bootstrap.Toast($("#liveToast")).show();
      }
    })

    $(".toast-header").css("background-color", "var(--bs-success )");
    $(".toast-body").html(
      "Los datos han sido actualizados correctamente"
    );
    new bootstrap.Toast($("#liveToast")).show();

    $("#staticBackdrop").modal("hide");
  })

  $(document).on("click", "#editar_mi_perfil", function(){
    $("#staticBackdrop").modal("show");
    $(".modal-title").text("Editar mi perfil");
    $(".modal-title").css("color", "white");
    $(".modal-header").css("background-color", "var(--bs-blue)");
    
    $.ajax({
      url: "indexAjax.php",
      type: "POST",
      data: { ruta: "ui/administrador/pages/form_users.php" },
      dataType: "html",
      success: function (response) {
        // Asignar el contenido del formulario al modal cuando AJAX termine
        $(".modal-body").html(response);
        $("#btn_form").text("Guardar cambios");
        $("#id_form").val("<?php echo $administrador->getIdUsuario(); ?>")
        $("#nombre_form").val("<?php echo $administrador->getNombre(); ?>")
        $("#apellido_form").val("<?php echo $administrador->getApellido(); ?>")
        $("#correo_form").val("<?php echo $administrador->getCorreo(); ?>")
        $("#estado_form").val("<?php echo $administrador->getEstado(); ?>")
        $("#fecha_nacimiento_form").val("<?php echo $administrador->getFechaNacimiento(); ?>")
        $("#telefono_form").val("<?php echo $administrador->getTelefono(); ?>")
        
      },
      error: function (xhr, status, error) {
        console.error("Error al cargar el formulario:", error);
      },
    });

    action = 3;
    console.log(action);
  })

  $(document).on("click", "#eliminar", function(){
    if($("#nombre_show").text() == ""){
      $(".toast-header").css("background-color", "var(--bs-red)");
      $(".toast-body").html(
        "Por favor seleccione un usuario para realizar la accion solicitada"
      );
      new bootstrap.Toast($("#liveToast")).show();
    }else{
      $("#staticBackdrop").modal("show");
      $(".modal-title").text("Eliminar usuario");
      $(".modal-title").css("color", "white");
      $(".modal-header").css("background-color", "var(--bs-danger)");
      
      $.ajax({
        url: "indexAjax.php",
        type: "POST",
        data: {
          ruta: "ui/administrador/pages/delete_user.php"
        },
        dataType: "text",
        success: function(response){
          $(".modal-body").html(response);
          $("#id_delete").html($("#id_show").text());
          $("#nombre_delete").html($("#nombre_show").text() + " " + $("#apellido_show").text());
        },
        error: function(xhr, status, error){
          console.error(error)
        }
      })
    }
    
  })

  $(document).on("click", "#btn_delete_submit", function(){
    $(".toast-header").css("background-color", "var(--bs-red)");
      $(".toast-body").html(
        "Se eliminó correctamente"
      );
      new bootstrap.Toast($("#liveToast")).show();
  })
});


</script>

<?php
$header -> close();