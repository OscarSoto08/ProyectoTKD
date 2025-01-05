<?php
// Inicia una sesión si aún no está iniciada
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Incluye los archivos necesarios para el funcionamiento del login
require 'ui/session/components/head.php'; // Encabezado HTML (estilos, metaetiquetas, etc.)
require 'ui/session/includes.php'; // Archivos y clases adicionales para la lógica del login

$error = ""; // Variable para almacenar errores durante la autenticación

// Verifica si ya hay un usuario autenticado y lo redirige a su panel correspondiente
if (isset($_SESSION['id'], $_SESSION['tipoUsuario'])) {
    redirectUser($_SESSION['tipoUsuario']); // Función que redirige al usuario según su tipo
}

// Procesa el formulario de inicio de sesión si se envió una solicitud POST
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['autenticar'], $_POST['correo'], $_POST['clave'])) {
    // Crea un objeto Usuario utilizando los datos enviados por el formulario
    $usuario = new Usuario(
        correo: $_POST["correo"],
        clave: md5($_POST["clave"]) // NOTA: Es recomendable cambiar md5() a password_hash() para mayor seguridad
    );

    // Verifica si el usuario existe
    if (!Usuario::verificar($usuario)) {
        $error = "El usuario no existe, regístrate."; // Mensaje de error si no se encuentra el usuario
    } 
    // Intenta autenticar al usuario
    elseif ($usuario->autenticar()) {
        handleUserStatus($usuario); // Maneja el estado del usuario después de autenticarse
    } else {
        $error = "Credenciales incorrectas."; // Mensaje de error para credenciales inválidas
    }
}

/**
 * Redirige al usuario según su tipo.
 *
 * @param string $tipoUsuario El tipo de usuario (1 = Administrador, 2 = Estudiante, 3 = Profesor)
 */
function redirectUser($tipoUsuario) {
    // Rutas de redirección según el tipo de usuario
    $routes = [
        '1' => 'ui/administrador/index.php',
        '2' => 'ui/estudiante/index.php',
        '3' => 'ui/profesor/index.php'
    ];

    // Verifica si el tipo de usuario tiene una ruta asociada y redirige
    if (isset($routes[$tipoUsuario])) {
        header('Location: ?pid=' . base64_encode($routes[$tipoUsuario])); // Redirección con ruta codificada
        exit(); // Termina el script después de redirigir
    }
}

/**
 * Maneja el estado del usuario después de autenticarse.
 *
 * @param Usuario $usuario Objeto usuario autenticado.
 */
function handleUserStatus($usuario) {
    $estado = $usuario->getEstado(); // Obtiene el estado actual del usuario (pendiente, denegado, etc.)

    // Si el usuario tiene un estado pendiente o denegado, lo redirige con el estado correspondiente
    if (in_array($estado, ['pendiente', 'denegado'])) {
        header("Location: ?pid=" . base64_encode('ui/session/pages/login.php') . "&status=" . base64_encode($estado));
        exit();
    } else {
        // Si el estado es válido, se guarda la sesión del usuario
        $_SESSION['id'] = $usuario->getIdUsuario(); // ID único del usuario
        $_SESSION['tipoUsuario'] = $usuario->getTipoUsuario(); // Tipo de usuario (administrador, estudiante, profesor)

        redirectUser($usuario->getTipoUsuario()); // Redirige al panel correspondiente
    }
}
?>
<body>
    <!-- Contenedor principal de la página -->
    <section class="container">
        <!-- Incluye el componente de la interfaz de usuario del login -->
        <?php include 'ui/session/components/login_container.php'; ?>
    </section>
</body>
</html>
