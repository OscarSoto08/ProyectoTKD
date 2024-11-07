<div class="login-container">
<div class="circle circle-one"></div>

<?php 
    if(isset($_GET['codExp'])){ ?>
        <div class="alert alert-danger" role="alert">
            El código que te enviamos ya no está disponible, por favor ingresa tus credenciales nuevamente...
        </div> <?php 
    }
    if(isset($_GET['UserAlreadyExists'])){ ?>
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
    <?php } } ?>     
<div class="form-container">
    
    <a href="../../index.php">
        <img id="kopulso-login-img" src="img/kopulsoNOchiquito.png" alt="illustration" class="illustration" />
    </a>
    
    <h1 class="opacity">Registro</h1>
    <form action="?pid=<?php echo base64_encode('ui/session/pages/signup.php');?>" method="post">
        <label for="nombre">Nombre Completo</label>
        <input id="nombre" name="nombre" type="text" placeholder="NOMBRES" required />
        <label for="apellido">Apellidos</label>
        <input id="apellido" name="apellido" type="text" placeholder="APELLIDOS" required />
        <label for="fNac">Fecha de nacimiento</label>
        <input id="fNac" name="fNac" type="date" required />
        <label for="correo">Correo</label>
        <input id="correo" name="correo" type="email" placeholder="CORREO" required />
        <label for="password">Contraseña</label>
        <input id="password" name="clave" type="password" placeholder="CONTRASEÑA" required />
        
        <label for="rol">Soy...</label>
        <div class="radio">
            <input type="radio" id="estudiante" name="rol" value="estudiante" onclick="cargarGrados()" required>
            <label for="estudiante">Estudiante</label>
        </div>
        <div class="radio">
            <input type="radio" id="profesor" name="rol" value="profesor" onclick="ocultarGrados()" required>
            <label for="profesor">Profesor</label>
        </div>
        <div id="grado" style="display: none;">
            <label for="grado">Selecciona tu grado:</label>
            <select name="grado" class="form-select mb-4" id="selectGrado" required>
                <?php 
                $grados = $gradoServ->getTodosLosGrados();
                foreach ($grados as $gradoItem) {
                    echo '<option value="'. $gradoItem->getIdGrado() .'">'. $gradoItem->getNombre() .'</option>'; 
                }
                ?>
            </select>
        </div>
        <button class="opacity" name="ingresar">INGRESAR</button>
    </form>
    <?php
        if($error){
            ?>
            <div class="alert alert-danger" role="alert">
                Hubo un error inesperado, por favor intentelo de nuevo...
            </div>
            <?php
        }
    ?>
    <div class="register-forget opacity">
        <a href="index.php">INICIAR SESION</a>
    </div>
</div>
<div class="circle circle-two"></div>
</div>