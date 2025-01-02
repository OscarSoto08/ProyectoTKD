<?php
require 'ui/session/components/head.php';
require 'ui/session/includes.php';
if(empty($_GET["token"])){
    // header("Location: ?pid=". base64_encode("ui/error404.php"));
}
$usuario = Usuario::consultarPorId($_GET["id"]);
echo $usuario -> getNombre();
if(isset($_POST['completar'])){
    $nombre = $_POST['nombre'] ?? '';
    $apellido = $_POST['apellido'] ?? '';
    $correo = $_POST['correo'] ?? '';
    $fecha_nacimiento = $_POST['fecha_nacimiento'] ?? '';
    $telefono = $_POST['telefono'] ?? '';
    $clave = md5($_POST['clave']) ?? '';
    $claveConfirmar = md5($_POST["clave2"])??'';

    if($clave == $claveConfirmar):
        
        $usuario_update = Usuario::actualizar(new Usuario(
            idUsuario: $id,
            nombre: $nombre,
            apellido: $apellido,
            correo: $correo,
            clave: $clave,
            fecha_nacimiento: $fecha_nacimiento,
            telefono: $telefono,
        ));
        header("Location: ?pid=". base64_encode("ui/session/pages/login.php"). "&status=3");
    endif;
}

//Queda validar la contraseña repetida y la logica del metodo get token y actualizar los datos
?>
<body>
    <section class="container">
        
    <div class="login-container" style="width: 500px;">
        <div class="circle circle-one"></div>   


        <div class="form-container">
<?php
if(isset($_POST["completar"])):
if($clave != $claveConfirmar):
    echo "id es: " . $_SESSION["ID"];
echo "<div role='alert'class='alert mx-auto my-5 alert-danger'>Las contraseñas no coinciden </div>";
endif;
endif;
?> 
        <h1 class="opacity">Completa tu registro</h1>
        <form action="?pid=<?php echo base64_encode('ui/session/pages/verify_code.php')?>" method="post">
            <label for="nombre">Nombre</label>
            <input id="nombre" name="nombre" type="text" placeholder="NOMBRE" required />
            <label for="apellido">Apellido</label>
            <input id="apellido" name="apellido" type="email" placeholder="APELLIDO" required />
            <label for="fecha_nacimiento">Fecha de nacimiento</label>
            <input id="fecha_nacimiento" name="fecha_nacimiento" type="DATE" placeholder="FECHA NACIMIENTO" required />
            <label for="clave">Contraseña</label>
            <input id="clave" name="clave" type="password" placeholder="CLAVE" required />
            <label for="clave2">Confirmar contraseña</label>
            <input id="clave2" name="clave2" type="password" placeholder="CLAVE" required />
            <label for="telefono">Telefono</label>
            <input id="telefono" name="telefono" type="tel" placeholder="TELEFONO" required />
            
            <button class="opacity mt-4" name="completar">COMPLETAR</button>
        </form>
        </div>
       <div class="circle circle-two"></div>
        </div>
    </section>

    
</body>
<style>
/* Ocultar la barra de desplazamiento */
::-webkit-scrollbar {
    display: none; /* Esto oculta la barra de desplazamiento */
}

body {
    overflow: scroll; /* Asegura que se pueda desplazar, pero sin mostrar la barra */
}
</style>
</html>