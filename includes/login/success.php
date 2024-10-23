<?php
require ('loginHead.php');
if(empty($_SESSION["codigo"])){
    session_destroy();
    header("Location: ../login");
    die();
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
                <h2 style="text-align: center; color: green; font-weight: 800;">¡Muchas gracias, por completar tu información!</h2>
                <p style="text-align: justify;">Estamos verificando tus datos...</p>
                <p style="text-align: justify; margin-bottom: 40px !important;">Una vez que hayamos terminado, te enviaremos un correo para avisarte que ya formas parte de la comunidad LTA Kopulso.
                </p>
                
                <a href="../../" class="opacity button text-center">Volver</a>
            </div>
            <div class="circle circle-two"></div>
        </div>
    </section>    
</body>
</html>