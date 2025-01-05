<div class="login-container">
    <?php
    // Decodifica el estado del usuario desde la URL si está presente
    $estado = base64_decode($_GET["status"] ?? "");

    /**
     * Muestra una alerta basada en el estado del usuario.
     *
     * @param string $estado El estado del usuario (pendiente, permitido, denegado, porCompletar).
     */
    function displayAlert($estado) {
        // Lista de posibles estados y sus mensajes
        $alertas = [
            "pendiente" => ["Estamos verificando tus datos", "alert-info"],
            "permitido" => ["El usuario que intentas registrar ya existe en la plataforma. <br> ¡Intenta iniciar sesión!", "alert-success"],
            "denegado" => ["Acceso restringido", "alert-danger"],
            "porCompletar" => ["¡Muy bien!, te hemos enviado un correo para completar tu registro en la plataforma 😊", "alert-warning"]
        ];

        // Si el estado existe en la lista de alertas, se muestra el mensaje correspondiente
        if (isset($alertas[$estado])) {
            list($estadoMessage, $alertClass) = $alertas[$estado];
            echo "<div class='text-center alert $alertClass' role='alert'>$estadoMessage</div>";
        }
    }

    // Llama a la función para mostrar la alerta
    displayAlert($estado);
    ?>

    <!-- Estructura principal del formulario de inicio de sesión -->
    <div class="circle circle-one"></div>
    <div class="form-container">
        <a href="?">
            <!-- Logo o imagen principal -->
            <img id="kopulso-login-img" src="img/kopulsoNOchiquito.png" alt="illustration" class="illustration" />
        </a>
        <h1 class="opacity">Iniciar Sesión</h1>

        <!-- Formulario de inicio de sesión -->
        <form action="?pid=<?php echo base64_encode('ui/session/pages/login.php') ?>" method="post">
            <!-- Campo de correo electrónico -->
            <input type="email" name="correo" placeholder="EMAIL" required />
            <!-- Campo de contraseña -->
            <input type="password" name="clave" placeholder="PASSWORD" required />
            <!-- Botón de enviar -->
            <button class="opacity" type="submit" name="autenticar" value="true">INGRESAR</button>
        </form>

        <!-- Mensaje de error en caso de que exista -->
        <?php if ($error): ?>
            <div class='alert alert-danger text-center' role='alert'><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <!-- Enlaces adicionales -->
        <div class="register-forget opacity">
            <a href="?pid=<?php echo base64_encode('ui/session/pages/signup.php'); ?>">REGISTRARSE</a>
            <a href="">OLVIDÉ MI CLAVE</a>
        </div>
    </div>
    <div class="circle circle-two"></div>
</div>
