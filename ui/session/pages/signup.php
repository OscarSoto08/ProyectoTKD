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
    $nombre = $_POST['nombre'] ?? '';
    $apellido = $_POST['apellido'] ?? '';
    $fecha_nacimiento = $_POST['fecha_nacimiento'] ?? '';
    $correo = $_POST['correo'] ?? '';
    $clave = $_POST['clave'] ? md5($_POST['clave']) : '';
    $telefono = $_POST['telefono'] ??'';
    $tipo_usuario = $_POST['tipo_usuario'] ??'';
    $idGrado = $_POST['grado'] ??'';

#Identificacion del tipo de usuario
    if ($tipo_usuario != '') {
        switch ($tipo_usuario) {
            case 'estudiante':
                $usuario = new Estudiante(
                    null,
                    $nombre,
                    $apellido,
                    $correo,
                    $clave,
                    'pendiente',
                    $fecha_nacimiento,
                    $telefono,
                    3,
                    'activo',
                    Grado_Servicio::consultar($idGrado) // Instancia de grado
                );
                $usuario_servicio = 'Estudiante_Servicio';
                break;
            case 'profesor':
                $usuario = new Profesor(
                    null,
                    $nombre,
                    $apellido,
                    $correo,
                    $clave,
                    'pendiente',
                    $fecha_nacimiento,
                    $telefono,
                    2,
                    'activo'
                );
                $usuario_servicio = 'Profesor_Servicio';
                break;
        }
    }
    

# 3. Verificación de si el usuario está en la plataforma o no

$tipos_usuario_serv = ['Administrador_Servicio', 'Profesor_Servicio', 'Estudiante_Servicio'];
foreach ($tipos_usuario_serv as $tipo_usuario) {
    if($tipo_usuario::consultarPorCorreo($usuario -> getCorreo())){ 
        switch($usuario -> getEstadoRegistro()){ # 4. El estado determina el mensaje que saldrá en login
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
}

# 5. En este punto el usuario no existe asi que lo registramos
$usuario_servicio::insertar($usuario);


#6. Validamos las credenciales con un código de verificación
$contenido_codigo = CodigoVerificacion_Servicio::generarCodigo(6);
$fecha_creado = date('Y-m-d H:i:s');
$fecha_expirado = date('Y-m-d H:i:s', strtotime('+10 minutes'));

#7. Una vez generado el codigo lo insertamos en la base de datos
$codigo = new CodigoVerificacion('', $contenido_codigo, $fecha_creado, $fecha_expirado, 'valido', $usuario);
CodigoVerificacion_Servicio::insertar($codigo);

#8. Se envia un correo para validar el código 
$mailRegistro = new Signup_Mail(
$usuario->getCorreo(),
$usuario->getNombre(),
$codigo->getContenidoCodigo()
);
$mailRegistro -> enviarCorreo();
$_SESSION['codigo'] = serialize($codigo);
#9. Se redirige a verificar codigo para la lógica
header("Location: ?pid=" . base64_encode('ui/session/pages/verify_code.php')); 

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


<!-- Pendiente:
1. Terminar de colocar el atributo name en los campos -- Completado
2. Agregar el campo de fecha de nacimiento en persona -- En proceso:

INSERT INTO tu_tabla (columna_fecha) 
VALUES (STR_TO_DATE('20/10/2024', '%d/%m/%Y'));


3. Crear un nuevo archivo php que sea para validar el codigo solamente
4. En el archivo php crear los parametros para enviar el correo
5. Guardar el codigo en la base de datos como si fuera en una tabla temporal llamada codigo, debe tener la fecha de creacion para poder hacer la diferencia de tiempo y evaluar si han pasado más de 10 minutos
6. Hacer la validacion
7. Hacer la pagina de envio de correo al administrador para poder agregar al usuario dentro de la tabla estudiante o profesor si la informacion es veridica
8. Hacer el crud del perfil administrador con cursos, eventos y usuarios
9. Hacer el front-end del profesor
10. Hacer el front-end del estudiante
11. Diseñar las preguntas y poblar la base de datos
12. Hacer el crud con preguntas
13. Hacer el crud con eventos
14. Implementar la funcion de que el estudiante pueda elegir participar en un evento 
15. Implementar la funcion de que el profesor pueda ver todos los estudiantes y a que eventos han participado
-->