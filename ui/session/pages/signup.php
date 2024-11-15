<?php 

require 'ui/session/components/head.php';
require 'ui/session/includes.php';

// Definicion de variables globales
$grado = null;

//Manejo de errores
$error = false;

if (isset($_POST['ingresar'])) {
    // Verifica si el campo "rol" está definido
    if (isset($_POST["rol"]) && $_POST["rol"] == "estudiante") {
        $idGrado = $_POST["grado"];
        $grado = GradoServicio::consultar($idGrado);
    }
    
    $user = new User(
        null,
        $_POST['nombre'],
        $_POST['apellido'],
        $_POST['correo'],
        md5($_POST['clave']),
        $_POST['fNac'],
        'pendiente',
        $_POST['telefono'],
        $_POST['rol'],
        $grado
    );

    // echo "El correo del usuario es: " . $_POST["correo"];

    //Primero que nada tenemos que verificar si el usuario ya existe en la base de datos
    if(UserServicio::autenticar($user)){
        //entonces mandar un mensaje de que el usuario ya existe, sin embargo hay que tener en cuenta el estado del usuario
        $status = 0;
        switch ($user -> getEstado()) {
            case 'pendiente':
                $status = 1;
                header("Location: ?pid=".base64_encode('ui/session/pages/login.php')."&status=". $status ."");
                exit();
            case 'permitido':
                $status = 2;
                header("Location: ?pid=".base64_encode('ui/session/pages/login.php')."&status=". $status ."");
                exit();
            case 'denegado': 
                $status = 3;
                header("Location: ?pid=".base64_encode('ui/session/pages/login.php')."&status=". $status ."");
                exit();
            default:
                $status = 0;
                break;
        }
    }
    

// En este punto el usuario no existe en la tabla usuario_temporal pero puede que si exista en alguna tabla diferente como administrador

//Tiene que haber una funcion buscarCorreo

$servUsuarios = ['AdminServicio', 'EstudianteServicio', 'ProfesorServicio'];
foreach($servUsuarios as $usuarioServ){
    if($usuarioServ::buscarCorreo($user -> getCorreo())){
        $error = false;
        header('Location: ?pid='. base64_encode('ui/session/pages/login.php') . '&userAlreadyExists=1');        
    }else{
        $error = true;
    }
}




    if($tempUserService -> registrar($user)){
       // echo "exito";     
        //Aca se genera el codigo de verificacion junto con el objeto para tener en cuenta las fechas
        $idCodigo = CodigoVerificacionServicio::generarCodigo(6);
        $fecha_creado = date('Y-m-d H:i:s');
        $fecha_expirado = date('Y-m-d H:i:s', strtotime('+10 minutes'));

        $codigo = new CodigoVerificacion($idCodigo, $fecha_creado, $fecha_expirado, 'valido', $user);

        //agregar el codigo a la bd
        CodigoVerificacionServicio::insertar($codigo);
        
        $mailRegistro = new Signup_Mail(
            $user->getCorreo(),
            $user->getNombre(),
            $idCodigo
        );

        //faltaria enviar el codigo a la base de datos
        $mailRegistro -> enviarCorreo();
        $_SESSION["codigo"] = serialize($codigo);
        header("Location: ?pid=" . base64_encode('ui/session/pages/verify_code.php')); 
    }else{
        $error = true;
        header("Location: ?pid=". base64_encode("ui/session/pages/signup.php"));
        die();
    }
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