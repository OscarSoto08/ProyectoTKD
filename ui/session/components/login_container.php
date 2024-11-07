<div class="login-container">
    <div class="circle circle-one"></div>
    <div class="form-container">
        <a href="?">
        <img id="kopulso-login-img" src="img/kopulsoNOchiquito.png" alt="illustration" class="illustration" />
        </a>
        <h1 class="opacity">Iniciar Sesion</h1>
        <form action="?pid=<?php echo base64_encode('ui/session/pages/login.php')?>" method="post">
            <input type="email" name="correo" placeholder="USERNAME" required />
            <input type="password" name="clave" placeholder="PASSWORD" required />
            <button class="opacity" type="submit" name="autenticar" value="true">INGRESAR</button>
        </form>
        <?php
            if($errorAuth){
                ?>
                <div class="alert alert-danger" role="alert">
                    Correo o clave incorrectos, intentelo nuevamente...
                </div>
                <?php
            }
        ?>
        <div class="register-forget opacity">
            <a href="?pid=<?php echo base64_encode('ui/session/pages/signup.php');?>">REGISTRARSE</a>
            <a href="">OLVIDÉ MI CLAVE</a>
        </div>
        
    </div>
    
    <div class="circle circle-two"></div>
</div>