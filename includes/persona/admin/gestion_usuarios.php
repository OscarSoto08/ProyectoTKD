<?php require 'admin_header.php';?>


<body>

  <div class="container">

    <!-- Filter Toolbar -->
    
      <div class="add" class="input-group "> 
        <button id="btnNuevo" class="d-flex gap-1" data-bs-toggle="modal" data-bs-target="#modalCRUD">
        <span class="material-symbols-outlined"> person_add </span> Nuevo 
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
            <!-- Agregar el rol para el usuario externo -->
            <?php echo ($_GET["rol"] == '4') ? "<th>Rol</th>" : ""; ?>
            <!-- Agregar el grado para los estudiantes o para los usuarios temporales -->
            <?php echo ($_GET["rol"] == "2" || $_GET["rol"] == "4") ? "<th>Cinturon</th>" : ""; ?>
            
            <th>Acciones</th>
          </tr>
        <thead>
        <tbody> </tbody>
      </table>
  </div>
  <?php include 'modal_usuario.php'; ?>
    
</body>
</html>
