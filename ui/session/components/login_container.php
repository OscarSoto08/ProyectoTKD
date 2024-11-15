<div class="login-container">


<?php
if(isset($_GET['status'])){ ?>
    <?php if($_GET["status"] == '1'){ ?>
    <div class="text-center alert alert-primary" role="alert">
        Estamos verificando tus datos
    </div> 
    <?php } else if($_GET["status"] == '2'){ ?>
    <div class="text-center alert alert-success" role="alert">
        Datos validos, ya puedes iniciar sesión en la plataforma
    </div> 
    <?php } else if($_GET["status"] == '3') { ?>
    <div class="text-center alert alert-danger" role="alert">
        Acceso restringido
    </div> 
    <?php } else if($_GET["status"] == '0') { ?>
    <div class="text-center alert alert-danger" role="alert">
        Hubo un problema, intentalo de nuevo...
    </div> 
    <?php 
    } 
} 
if($_GET['userAlreadyExists'] == 1){ ?>
    <div class="text-center alert alert-success" role="alert">
        El usuario que intentas registrar ya existe en la plataforma. <br> ¡Intenta iniciar sesion!
    </div> 
<?php    
}
?> 



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