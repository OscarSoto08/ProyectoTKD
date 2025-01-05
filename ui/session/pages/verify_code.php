<?php
//Y29kaWdv = codigo

require 'ui/session/components/head.php';
require 'ui/session/includes.php';
$token = new Token();

if(isset($_GET["Y29kaWdv"])){
    $_SESSION["codigo"] = base64_decode($_GET["Y29kaWdv"]);
}
$codigo = $_SESSION["codigo"];

$token -> consultarPorCodigo($codigo);
$usuario = $token -> getUsuario();

if(isset($_POST['completar'])):
    // Recibir los datos del formulario
    $id = $_POST['id'] ?? '';
    $nombre = $_POST['nombre'] ?? '';
    $apellido = $_POST['apellido'] ?? '';
    $fecha_nacimiento = $_POST['fecha_nacimiento'] ?? '';
    $telefono = $_POST['telefono'] ?? '';
    $clave = md5($_POST['clave']) ?? '';
    $claveConfirmar = md5($_POST['clave2'])??'';
    
    if($clave == $claveConfirmar): // Si las contraseñas coinciden
    
    
    // Actualizar los datos del usuario
    $usuario->setNombre($nombre);
    $usuario->setApellido($apellido);
    $usuario->setFechaNacimiento($fecha_nacimiento);
    $usuario->setTelefono($telefono);
    $usuario->setClave($clave);

    $usuario->actualizar();
    

    $token -> setEstado("invalido");
    $token -> cambiarEstado($token);

    session_destroy();
    header("Location: ?pid=". base64_encode("ui/session/pages/login.php"). "&status=1");
    
    endif;
endif;


// echo "<h1>El id del usuario es: " . $usuario->getIdUsuario() . "</h1>";

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
echo "<div role='alert'class='alert mx-auto my-5 alert-danger'>Las contraseñas no coinciden </div>";
endif;
endif;
?> 
        <h1 class="opacity">Completa tu registro</h1>
        <p>Llena los campos a continuación para completar tu perfil</p>
        <form action="?pid=<?php echo base64_encode('ui/session/pages/verify_code.php')?>" method="post">
            <input id="nombre" name="nombre" type="text" class="form-control" placeholder="Nombres" required />
            
            <input id="apellido" name="apellido" type="text" class="form-control" placeholder="Apellidos (opcional)" />

            <div class="form-group">
                <h5 for="fecha_nacimiento" class="form-text"> Fecha de Nacimiento</h5>
                <input id="fecha_nacimiento" name="fecha_nacimiento" class="form-control" type="DATE" required />
            </div>
            
            <input id="clave" name="clave" type="password"  class="form-control" placeholder="Contraseña" required />

            <input id="clave2" name="clave2" type="password" class="form-control" placeholder="Confirmar Contraseña" required />

            <input id="telefono" name="telefono" type="tel" class="form-control" placeholder="Telefono" required />
            
            <button class="opacity mt-4" name="completar">COMPLETAR REGISTRO</button>
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