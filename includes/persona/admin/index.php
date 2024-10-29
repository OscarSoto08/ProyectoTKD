<?php require "admin_header.php"; ?>
<body>
  <section id="inicio" class="row">
    <img class="col" src="https://i.ibb.co/1TLZ2Tg/rhino-Adult.png" alt="rhino-Adult" border="0">
    <div class="presentacion col">
      <h2 class="text-center">datos de admin...</h2>
    </div>
  </section>
  <!-- Sección de Usuarios -->
  <main class="container row">
      <section id="usuarios" class="col">
        <hgroup>
          <h2>Gestión de Usuarios</h2>
          <h3>Controla y administra los roles de los usuarios</h3>
        </hgroup>
        <p>Aquí puedes agregar, editar o eliminar usuarios según su rol (estudiantes, profesores, administradores, usuarios temporales).</p>
        <figure>
          <!-- imagen gestion de usuarios -->
          <figcaption>Ícono de Usuarios</figcaption>
        </figure>
      </section>

      <!-- Sección de Eventos -->
      <section id="eventos" class="col">
        <hgroup>
          <h2>Gestión de Eventos</h2>
          <h3>Organiza los eventos de la empresa</h3>
        </hgroup>
        <p>Crea, edita o elimina eventos de la empresa, y mantén un registro de todos los eventos importantes.</p>
        <figure>
          <!-- imagen gestion de eventos -->
          <figcaption>Ícono de Eventos</figcaption>
        </figure>
      </section>

      <!-- Sección de Cursos -->
      <section id="cursos" class="col">
        <hgroup>
          <h2>Gestión de Cursos</h2>
          <h3>Administra los cursos de los estudiantes</h3>
        </hgroup>
        <p>Aquí puedes asignar, modificar o eliminar cursos para los estudiantes, manteniendo su progreso académico actualizado.</p>
        <figure>
          <!-- imagen gestion de cursos -->
          <figcaption>Ícono de Cursos</figcaption>
        </figure>
      </section>
    </div>
  </main>
  <style>
    section{
      margin: 50px;
      border: 2px solid beige;
      border-radius: 10px;
      padding: 40px;
    }
    #inicio{
      height: 65vh;
    }
  </style>
</body>
</html>
