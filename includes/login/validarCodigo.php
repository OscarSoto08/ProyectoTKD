<?php 
require '../../service/persona/estudianteServicio.php';
require '../../service/persona/gradoServicio.php';
require '../../service/persona/tempUserServicio.php';

require '../../Persistencia/Conexion.php';
require '../../Persistencia/EstudianteDAO.php';
require '../../Persistencia/GradoDAO.php';
require '../../Persistencia/tempUserDAO.php';

require '../../model/Grado.php';
require '../../model/tempUser.php';

require '../login/emailRegisto.php';

//

session_start();
if(empty($_SESSION['idUser'])){
    session_destroy();
    header('../login');
    die();
}

// Lectura de datos
$grado = null;
$gradoServ = new GradoServicio();

//Servicio de usuarios
$CamposIncompletos = false;

if (isset($_POST['validar'])) {
    // Verifica que cada campo esté definido y no esté vacío
    if (empty($_POST["nombre"])) {
        $CamposIncompletos = true;
        header("Location: registro.php");
        exit; // Detener la ejecución si hay campos incompletos
    }

    //Logica para enviar el email

    $user = new TempUser(null, $_POST["nombre"], $_POST["apellido"], $_POST["correo"], md5($_POST["clave"]), null, null, $_POST["fNac"], $_POST["rol"], $grado);
    // echo "El correo del usuario es: " . $_POST["correo"];
    $tempUserService = new TempUserServicio();
    if($tempUserService -> registrar($user)){
       // echo "exito";
        $codigo = rand(100000, 999999);
        $mailRegistro = new EmailRegistro(
            $user->getCorreo(),
            $user->getNombre(),
            $codigo
        );
        $mailRegistro->enviarCorreo();
    }else{
        $error = true;
        echo "error";
    }
}

if(isset($_POST["reenviar"])) {
    //logica para enviar nuevamente el correo
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@400;700&display=swap" rel="stylesheet">

    <!-- JQUERY -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/script.js" defer></script>

    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" defer></script>

    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/login.css">
</head>
<body>
    <section class="container">
        <div class="login-container">
            <div class="circle circle-one"></div>
            <div class="form-container">
                <a href="../../index.php">
                    <img id="kopulso-login-img" src="../../img/kopulsoNOchiquito.png" alt="illustration" class="illustration" />
                </a>
                <h1 class="opacity">Código de verificación</h1>
                <form action="registro.php" method="post">
                    <p>Hemos enviado un código de verificación a tu correo electrónico. Por favor, ingresa el código en el campo de abajo para continuar.</p>
                    <input id="nombre" name="nombre" type="text" placeholder="######" required />
                    <button type="submit" class="opacity" name="validar">VALIDAR</button>
                </form>
                <div class="d-flex flex-column">
                    <p id="txtCountdown">Por favor, espera <span id="countdown">30</span> segundos antes de reenviar.</p>
                    <button class="opacity btn btn-success" name="reenviar" id="reenviar" disabled>Reenviar</button>
                </div>
            </div>
            <div class="circle circle-two"></div>
        </div>
    </section>
    <script>
        function ocultarGrados() {
            document.getElementById("grado").style.display = 'none';
        }
        function cargarGrados() {
            document.getElementById('grado').style.display = 'block';
        }

        let txtCountdown = document.getElementById('txtCountdown');
        let countdown = document.getElementById('countdown');
        let reenvioBtn = document.getElementById('reenviar');

        reenvioBtn.onclick = () => {
            reenvioBtn.disabled = true;
            iniciarCuentaRegresiva(30);
        };

        function iniciarCuentaRegresiva(segundos) {
            let tiempoRestante = segundos;

            
            reenvioBtn.disabled = true;

            const countdownInterval = setInterval(() => {
                txtCountdown.textContent = `Por favor, espera ${tiempoRestante} segundos antes de reenviar.`;
                tiempoRestante--;
                countdown.innerHTML = tiempoRestante;

                if (tiempoRestante < 0) {
                    clearInterval(countdownInterval);
                    reenvioBtn.disabled = false;
                    countdown.textContent = '';
                    txtCountdown.textContent = '¡Ahora puedes reenviar!';
                }
            }, 1000);
        }


        window.onload = () => {
            iniciarCuentaRegresiva(30);
        };
    </script>
</body>
</html>