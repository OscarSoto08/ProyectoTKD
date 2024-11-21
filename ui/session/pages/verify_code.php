<?php 
// Se incluyen los archivos necesarios para la interfaz y las funcionalidades de la sesión
require 'ui/session/components/head.php';  // Encabezado de la página
require 'ui/session/includes.php';  // Archivos de inclusión adicionales para la sesión

// Si no hay una sesión iniciada, se inicia una nueva sesión
if(session_status() == PHP_SESSION_NONE) session_start();

// Verifica si no hay un código de verificación guardado en la sesión
if(empty($_SESSION['codigo'])){
    // Si no hay código, redirige a la página de inicio con un parámetro codificado
    header('Location: ?cs='. base64_encode('true'));
    die();  // Detiene la ejecución del script
}


// Se deserializa el código de verificación almacenado en la sesión
$codigo = unserialize($_SESSION['codigo']);

$user = $codigo->getUsuario();  // Obtiene el usuario asociado al código de verificación
// Se obtiene el contenido del código de verificación y la fecha actual
$idCodigoVerdadero = $codigo->getContenidoCodigo();
$fecha_actual = new DateTime(date('Y-m-d H:i:s'));  // Fecha y hora actual
$fecha_fin = new DateTime($codigo->getFechaExpirado());  // Fecha de expiración del código

// Calcula la diferencia entre la fecha actual y la fecha de expiración
$diferencia = $fecha_actual->diff($fecha_fin);

// Si la fecha actual ya ha superado la fecha de expiración
if ($diferencia->invert) {
    // Si el código aún está en estado 'valido', se cambia a 'invalido'
    if($codigo->getEstado() == 'valido') CodigoVerificacion_Servicio::cambiarEstado($codigo, 'invalido'); 

    // Redirige a la página de registro indicando que el código ha expirado
    header("Location: registro.php?codExp=1");
    die();  // Detiene la ejecución del script
}

// Calcula la diferencia total en segundos entre la fecha actual y la fecha de expiración
$totalSegundos = ($diferencia->days * 24 * 60 * 60) + 
                 ($diferencia->h * 60 * 60) + 
                 ($diferencia->i * 60) + 
                 $diferencia->s;

// Calcula los minutos y segundos restantes
$minutos = floor($totalSegundos / 60);
$segundos = $totalSegundos % 60;

// Si se ha enviado un formulario de validación
if (isset($_POST['validar'])) {
    $CodigoIngresado = $_POST['codigo'];  // Obtiene el código ingresado por el usuario

    // Si el código ingresado es correcto
    if($CodigoIngresado == $idCodigoVerdadero){
        // Cambia el estado del código a 'invalido'
        CodigoVerificacion_Servicio::cambiarEstado($codigo, 'invalido');
        
        // Redirige a la página de éxito
        header("Location: ?pid=". base64_encode('ui/session/pages/success.php'));
        exit();  // Detiene la ejecución del script
    } else {
        // Si el código es incorrecto, redirige a la página de verificación con un parámetro de error
        header("Location: ?pid=".base64_encode('ui/session/pages/verify_code.php')."&inv=1");
    }
}

// Si se ha solicitado reenviar el código
if(isset($_GET["resend"])) {
    // Cambia el estado del código a 'invalido'
    CodigoVerificacion_Servicio::cambiarEstado($codigo, "invalido");

    // Genera un nuevo código de verificación
    $idCodigo = CodigoVerificacion_Servicio::generarCodigo(6);  // Genera un código de 6 caracteres
    $fecha_creado = date('Y-m-d H:i:s');  // Fecha de creación del nuevo código
    $fecha_expirado = date('Y-m-d H:i:s', strtotime('+10 minutes'));  // Fecha de expiración del nuevo código (10 minutos después)
    $estado = 'valido';  // El nuevo código es válido

    // Crea un nuevo objeto de código de verificación
    $codigo = new CodigoVerificacion($idCodigo, $fecha_creado, $fecha_expirado, $estado, $user);

    // Inserta el nuevo código en la base de datos
    CodigoVerificacion_Servicio::insertar($codigo);

    // Almacena el nuevo código en la sesión
    $_SESSION["codigo"] = $codigo;

    // Crea un objeto para enviar el correo de registro
    $mailRegistro = new Signup_Mail(
        $user->getCorreo(),  // Correo del usuario
        $user->getNombre(),  // Nombre del usuario
        $idCodigo  // Código de verificación generado
    );
    $mailRegistro->enviarCorreo();  // Envía el correo de verificación
}
?>

<body>
    <section class="container">
        <div class="login-container">
            <div class="circle circle-one"></div>
            
            <!-- Si hay un error en el código ingresado, muestra un mensaje de alerta -->
            <?php if(isset($_GET["inv"])) { ?>
                <div class="text-center alert alert-danger" role="alert">
                    Código incorrecto...
                </div> 
            <?php }  ?>  
            
            <div class="form-container">
                <!-- Imagen de la aplicación -->
                <a href="?">
                    <img id="kopulso-login-img" src="img/kopulsoNOchiquito.png" alt="illustration" class="illustration" />
                </a>
                
                <!-- Título del formulario -->
                <h1 class="opacity">Código de verificación</h1>
                
                <!-- Formulario de verificación del código -->
                <form action="?pid=<?php echo base64_encode('ui/session/pages/verify_code.php'); ?>" method="post">
                    <p>Hemos enviado un código de verificación a tu correo electrónico. Por favor, ingresa el código en el campo de abajo para continuar.</p>
                    
                    <!-- Campo de entrada para el código de verificación -->
                    <input id="codigo" name="codigo" type="text" placeholder="######" oninput="upperCase()" required/>
                    
                    <!-- Botón de validación -->
                    <button type="submit" class="opacity" name="validar">VALIDAR</button>
                    
                    <!-- Sección de reenvío del código -->
                    <div class="d-flex flex-column">
                        <p class="text-center" id="txtCountdown">Por favor, espera <span id="countdown">55</span> segundos antes de reenviar.</p>
                        <button class="opacity btn btn-success" name="reenviar" id="reenviar" type="submit">Reenviar</button>
                    </div>
                </form>
            </div>
            <div class="circle circle-two"></div>
        </div>
    </section>

    <script>
        // Función para convertir el texto ingresado en mayúsculas
        function upperCase(){
            let inputCod = document.getElementById('codigo');
            inputCod.value = inputCod.value.toUpperCase();
        }

        // Variables para la cuenta regresiva y el botón de reenvío
        let txtCountdown = document.getElementById('txtCountdown');
        let countdown = document.getElementById('countdown');
        let reenvioBtn = document.getElementById('reenviar');

        // Acción cuando se hace clic en el botón de reenvío
        reenvioBtn.onclick = () => {
            reenvioBtn.disabled = true;  // Deshabilita el botón
            iniciarCuentaRegresiva(55);  // Inicia la cuenta regresiva
            window.location.href = 'validarCodigo.php?resend=1';  // Redirige para reenviar el código
        };

        // Función para iniciar la cuenta regresiva
        function iniciarCuentaRegresiva(segundos) {
            let tiempoRestante = segundos;

            // Deshabilita el botón de reenvío
            reenvioBtn.disabled = true;

            // Intervalo para actualizar la cuenta regresiva cada segundo
            const countdownInterval = setInterval(() => {
                txtCountdown.textContent = `Por favor, espera ${tiempoRestante} segundos antes de reenviar.`;
                tiempoRestante--;
                countdown.innerHTML = tiempoRestante;

                // Cuando la cuenta regresiva llega a cero, habilita el botón de reenvío
                if (tiempoRestante < 0) {
                    clearInterval(countdownInterval);  // Detiene el intervalo
                    reenvioBtn.disabled = false;  // Habilita el botón
                    countdown.textContent = '';  // Limpia el contador
                    txtCountdown.textContent = '¡Ahora puedes reenviar!';  // Mensaje indicando que se puede reenviar
                }
            }, 1000);  // Actualiza cada segundo
        }

        // Inicia la cuenta regresiva cuando se carga la página
        window.onload = () => {
            iniciarCuentaRegresiva(55);
        };
    </script>
</body>
</html>
