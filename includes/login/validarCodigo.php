<?php 
require 'loginHead.php';

if(empty($_SESSION['codigo'])){
    session_destroy();
    header('Location: ../login');
    die();
}

$codigo = $_SESSION['codigo'];
$codigoServ = new CodigoVerificacionServicio();
$idCodigoVerdadero = $codigo -> getIdCodigo();
$fecha_actual = date('Y-m-d H:i:s');
$fecha_actual = new DateTime($fecha_actual);
//$fecha_actual = new DateTime($codigo->getFecha_creado());
$fecha_fin = new DateTime($codigo->getFecha_expirado());
$diferencia = $fecha_actual->diff($fecha_fin);

if ($diferencia->invert) {
    if($codigo -> getEstado() == 'valido') $codigoServ -> cambiarEstado($codigo, 'invalido'); //Para este momento la fecha actual ya habrá superado la fecha limite por lo tanto si el estado no se ha actualizado todavia entonces se modifica
    header("Location: registro.php?codExp=1");
    die();
}// else {
//     echo "La diferencia es positiva: ";
// }

// Para mostrar la diferencia
// Obtener la diferencia total en segundos
$totalSegundos = ($diferencia->days * 24 * 60 * 60) + 
                 ($diferencia->h * 60 * 60) + 
                 ($diferencia->i * 60) + 
                 $diferencia->s;

// Calcular minutos y segundos
$minutos = floor($totalSegundos / 60);
$segundos = $totalSegundos % 60;

// Mostrar resultados
//echo " $minutos minutos y $segundos segundos<br>";

if (isset($_POST['validar'])) {
    $CodigoIngresado = $_POST['codigo'];
    if($CodigoIngresado == $idCodigoVerdadero){
        $codigoServ -> cambiarEstado($codigo, 'invalido');
        header("Location: success.php");
    }
}

if(isset($_POST["reenviar"])) {
    //logica para enviar nuevamente el correo
}

?>
<body>
    <section class="container">
        <div class="login-container">
            <div class="circle circle-one"></div>
            <div class="form-container">
                <a href="../../index.php">
                    <img id="kopulso-login-img" src="../../img/kopulsoNOchiquito.png" alt="illustration" class="illustration" />
                </a>
                <h1 class="opacity">Código de verificación</h1>
                <form action="validarCodigo.php" method="post">
                    <p>Hemos enviado un código de verificación a tu correo electrónico. Por favor, ingresa el código en el campo de abajo para continuar.</p>
                    <input id="codigo" name="codigo" type="text" placeholder="######" oninput="upperCase()" required/>
                    <button type="submit" class="opacity" name="validar">VALIDAR</button>
                </form>
                <div class="d-flex flex-column">
                    <p id="txtCountdown">Por favor, espera <span id="countdown">55</span> segundos antes de reenviar.</p>
                    <button class="opacity btn btn-success" name="reenviar" id="reenviar" disabled>Reenviar</button>
                </div>
            </div>
            <div class="circle circle-two"></div>
        </div>
    </section>
    <script>
        function upperCase(){
            let inputCod = document.getElementById('codigo');
            inputCod.value = inputCod.value.toUpperCase();
        }
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
            iniciarCuentaRegresiva(55);
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
            iniciarCuentaRegresiva(55);
        };
    </script>
</body>
</html>