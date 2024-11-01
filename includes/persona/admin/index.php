<?php require "admin_header.php"; ?>
<body>

<div class="mb-5 container">
 <div class="wrapper">
   <div class="banner-image mb-3"> <img src="https://i.ibb.co/1TLZ2Tg/rhino-Adult.png" alt="rhino-Adult" border="0"></div>
   <h1> <?php echo $administrador -> getNombre() . ' '. $administrador -> getApellido() ; ?></h1>
   <p>Lorem ipsum dolor sit amet, <br/>
     consectetur adipiscing elit.</p>
  </div>
  <div class="button-wrapper"> 
  <button class="btn outline">CERRAR SESION</button>
    <button class="btn fill">CONFIGURACIÓN</button>
  </div>
    </div>
</div>


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
      border: 2px solid beige;
      margin: 50px 0;
      padding: 30px;
    }
  </style>
</body>
</html>
