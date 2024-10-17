<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/login.css">
    <style>
        /* Estilos CSS aquí */
    </style>
</head>
<body>
    <section class="container">
        <div class="login-container">
            <div class="circle circle-one"></div>
            <div class="form-container">
                <a href="../../index.php">
                    <img id="kopulso-login-img" src="../../img/kopulsoNOchiquito.png" alt="illustration" class="illustration" />
                </a>
               <h1 class="opacity">Registro</h1>
                <form action="registro.php" method="post">
                    <label for="nombre">Nombre Completo</label>
                    <input id="nombre" type="text" placeholder="NOMBRES" />
                    <input type="text" placeholder="APELLIDOS" />
                    <label for="fNac">Fecha de nacimiento</label> 
                    <input id="fNac" type="date" placeholder="FECHA DE NACIMIENTO" />
                    <label for="correo">Correo</label>
                    <input id="correo" type="text" placeholder="CORREO" />
                    <label for="password">Contraseña</label>
                    <input id="password" type="password" placeholder="PASSWORD" />
                    <button class="opacity">INGRESAR</button>
                </form>
                <div class="register-forget opacity">
                    <a href="index.php">INICIAR SESION</a>
                </div>
            </div>
            <div class="circle circle-two"></div>
        </div>
    </section>

</body>
</html>