<?php
require ('loginHead.php');

//manejo de errores
$CamposIncompletos = false;
$errorAuth = false;

if (isset($_POST['autenticar'])) {
    $correo = $_POST['correo'];
    $clave = md5($_POST['clave']);

    if (empty($correo) || empty($clave)) {
        $CamposIncompletos = true;
    } 
        $admin = new Administrador(null,null,null,$correo, $clave, null,null,null);
        $adminServicio = new AdminServicio();
        if($adminServicio -> autenticar($admin)){
            $_SESSION["id"] = $admin -> getIdPersona(); 
            header("Location: ../persona/admin");
        }else{
            $errorAuth = true;
        }
    
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
                <h1 class="opacity">Iniciar Sesion</h1>
                <form action="index.php" method="post">
                    <input type="email" name="correo" placeholder="USERNAME" />
                    <input type="password" name="clave" placeholder="PASSWORD" />
                    <button class="opacity" type="submit" name="autenticar" value="true">INGRESAR</button>
                </form>
                <?php
                    if($CamposIncompletos){
                        ?>
                        <div class="alert alert-danger" role="alert">
                            Campos incompletos, por favor completalos...
                        </div>
                        <?php
                    }
                    if($errorAuth){
                        ?>
                        <div class="alert alert-danger" role="alert">
                            Correo o clave incorrectos, intentelo nuevamente...
                        </div>
                        <?php
                    }
                ?>
                <div class="register-forget opacity">
                    <a href="registro.php">REGISTRARSE</a>
                    <a href="">OLVIDÉ MI CLAVE</a>
                </div>
                
            </div>
            
            <div class="circle circle-two"></div>
        </div>
    </section>

</body>
</html>