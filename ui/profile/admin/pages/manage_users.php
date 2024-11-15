<?php require_once 'ui/profile/admin/components/admin_header.php';?>

<body>

  <!-- Contenedor que usa Flexbox para centrar -->
  <div class="d-flex justify-content-center my-4">
    <div class="add">
      <button id="btnNuevo" class="d-flex gap-1" data-bs-toggle="modal" data-bs-target="#modalCRUD">
        <svg style="width: 20px; height: 20px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
          <path fill="#FFFFFF" d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 144L48 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l144 0 0 144c0 17.7 14.3 32 32 32s32-14.3 32-32l0-144 144 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-144 0 0-144z"/>
        </svg>
        Nuevo
      <?php
      switch ($_GET["rol"]) {
      case '1':
      echo 'profesor';
      break;

      case '2':
      echo 'estudiante';
      break;

      case '3':
      echo 'administrador';
      break;
      case '4':
      echo 'usuario';
      break;
      }
      ?>        
      </button>
    </div>
  </div>

  <div class="container">
    <table id="tabla_usuarios" class="table-responsive">
      <thead>
        <tr>
          <th>Codigo</th>
          <th>Nombre</th>
          <th>Apellido</th>
          <th>Correo</th>
          <th>Fecha nacimiento</th>
          <th>Estado</th>
          <th>Telefono</th>
          <?php echo ($_GET["rol"] == '4') ? "<th>Rol</th>" : ""; ?>
          <?php echo ($_GET["rol"] == "2" || $_GET["rol"] == "4") ? "<th>Cinturon</th>" : ""; ?>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody></tbody>
    </table>
  </div>  

  <?php require 'ui/profile/admin/components/modal_usuario.php'; ?>

</body>
</html>



