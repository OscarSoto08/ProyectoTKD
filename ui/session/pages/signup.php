<?php 

require 'ui/session/components/head.php';
require 'ui/session/includes.php';

// Definicion de variables globales
$grado = null;
$usuario = null; //Si el usuario al final del algoritmo es nulo se envia un mensaje de error
//Manejo de errores
$usuario_servicio = null;
$error = false;

if (isset($_POST['ingresar'])) {
    
# 1. Lectura de datos    
    $username = $_POST['username'] ?? '';
    $correo = $_POST['correo'] ?? '';
    $tipo_usuario = $_POST['tipo_usuario'] ??'';
    $idGrado = $_POST['grado'] ??'';

#Identificacion del tipo de usuario
    $usuario = match ($tipo_usuario) {
        'estudiante' => new Estudiante(
            username: $username,
            correo: $correo,
            estado: "pendiente",
            tipo_usuario: 2,
            grado: Grado::consultar($idGrado) // Instancia de grado
        ),
        'profesor' => new Profesor(
            username: $username,
            correo: $correo,
            estado: 'pendiente',
            tipo_usuario: 3
        ),
    };

if(Usuario::verificar($usuario)){ # 3 Si el usuario ya existe en la plataforma 
    switch($usuario -> getEstado()){ # 4. El estado determina el mensaje que saldrá en login
        case 'pendiente': 
            header("Location: ?pid=".base64_encode('ui/session/pages/login.php')."&status=1"); // status = 1: Estamos verificando tus datos
            exit();
        case 'permitido':
            header("Location: ?pid=".base64_encode('ui/session/pages/login.php')."&status=2"); // status = 2. Datos validos, ya puedes iniciar sesión en la plataforma
            exit();
        case 'denegado':
            header("Location: ?pid=".base64_encode('ui/session/pages/login.php')."&status=3"); // status = 3. Acceso restringido
            exit();
    }
}


# 5. En este punto el usuario no existe asi que lo registramos
$usuario->insertar();


#6. Validamos las credenciales con un código de verificación
$contenido_codigo = Token::generarCodigo(10);
$fecha_creado = date('Y-m-d H:i:s');
$fecha_expirado = date('Y-m-d H:i:s', strtotime('+40 minutes'));

#7. Una vez generado el codigo lo insertamos en la base de datos
$codigo = new Token(
    '',
    $contenido_codigo,
    'registro',
    $fecha_creado,
    $fecha_expirado,
    'valido',
    $usuario
);
$codigo->insertar($codigo);

#8. Se envia un correo para validar el código 
$mailRegistro = new Signup_Mail(
$usuario->getCorreo(),
$usuario->getUsername(),
$codigo->getCodigo(),
$usuario
);
$mailRegistro -> enviarCorreo();
$_SESSION['codigo'] = serialize($codigo);
#9. Se redirige a verificar codigo para la lógica
// echo("?pid=".base64_encode('ui/session/pages/verify_code.php')."&token=".base64_encode($codigo->getCodigo()));
header("Location: ?pid=" . base64_encode('ui/session/pages/login.php') . "&status=4"); 
}
?>

<body>
    <section class="container">
        <?php include 'ui/session/components/signup_container.php'; ?>
    </section>
    <script>
        function ocultarGrados() {
            document.getElementById("grado").style.display = 'none';
        }
        function cargarGrados() {
            document.getElementById('grado').style.display = 'block';
        }
    </script>
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