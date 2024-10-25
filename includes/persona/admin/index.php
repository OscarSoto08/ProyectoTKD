<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Panel de Administración</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@1/css/pico.min.css">
  <style>
    body {
      padding: 20px;
    }
    header, section, footer {
      margin-bottom: 40px;
    }
    img {
      max-width: 150px;
      margin: 20px 0;
    }
    hgroup h2 {
      font-size: 2rem;
    }
    nav ul {
      display: flex;
      justify-content: space-between;
    }
  </style>
</head>
<body>

  <!-- Navegación -->
  <nav class="container-fluid">
    <ul>
      <li><strong>Admin Panel</strong></li>
    </ul>
    <ul>
      <li><a href="#usuarios">Usuarios</a></li>
      <li><a href="#eventos">Eventos</a></li>
      <li><a href="#cursos">Cursos</a></li>
    </ul>
  </nav>

  <!-- Sección de Usuarios -->
  <main class="container">
    <div class="grid">
      <section id="usuarios">
        <hgroup>
          <h2>Gestión de Usuarios</h2>
          <h3>Controla y administra los roles de los usuarios</h3>
        </hgroup>
        <p>Aquí puedes agregar, editar o eliminar usuarios según su rol (estudiantes, profesores, administradores, usuarios temporales).</p>
        <figure>
          <img src="https://files.oaiusercontent.com/file-fUcV469HDXQUSfDeOcfAIuzv" alt="Ícono de gestión de usuarios">
          <figcaption>Ícono de Usuarios</figcaption>
        </figure>
      </section>

      <!-- Sección de Eventos -->
      <section id="eventos">
        <hgroup>
          <h2>Gestión de Eventos</h2>
          <h3>Organiza los eventos de la empresa</h3>
        </hgroup>
        <p>Crea, edita o elimina eventos de la empresa, y mantén un registro de todos los eventos importantes.</p>
        <figure>
          <img src="https://files.oaiusercontent.com/file-XtFcifI4MnSzDyQOE8l7RwDI" alt="Ícono de gestión de eventos">
          <figcaption>Ícono de Eventos</figcaption>
        </figure>
      </section>

      <!-- Sección de Cursos -->
      <section id="cursos">
        <hgroup>
          <h2>Gestión de Cursos</h2>
          <h3>Administra los cursos de los estudiantes</h3>
        </hgroup>
        <p>Aquí puedes asignar, modificar o eliminar cursos para los estudiantes, manteniendo su progreso académico actualizado.</p>
        <figure>
          <img src="https://files.oaiusercontent.com/file-YW7fVvxaB3A28z2vJ2X9EP8F" alt="Ícono de gestión de cursos">
          <figcaption>Ícono de Cursos</figcaption>
        </figure>
      </section>
    </div>
  </main>

  <!-- Pie de página -->
  <footer class="container">
    <small><a href="#">Términos</a> • <a href="#">Política de Privacidad</a></small>
  </footer>

</body>
</html>
