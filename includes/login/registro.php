<?php 

require('loginHead.php');

// Definicion de variables globales
$grado = null;
$gradoServ = new GradoServicio();

//Manejo de errores
$CamposIncompletos = false;
$error = false;

if (isset($_POST['ingresar'])) {
    // Verifica que cada campo esté definido y no esté vacío
    if (empty($_POST["nombre"]) || empty($_POST["apellido"]) || empty($_POST["correo"]) || empty($_POST["clave"]) || empty($_POST["fNac"]) || empty($_POST["rol"])) {
        $CamposIncompletos = true;
        header("Location: registro.php");
        die(); // Detener la ejecución si hay campos incompletos
    }

    // Verifica si el campo "rol" está definido
    if (isset($_POST["rol"]) && $_POST["rol"] == "estudiante") {
        $idGrado = $_POST["grado"];
        $grado = new Grado($idGrado);
        $gradoServ->consultar($grado);
    }
    
    $user = new User(null, $_POST["nombre"], $_POST["apellido"], $_POST["correo"], md5($_POST["clave"]), null, null, $_POST["fNac"], $_POST["rol"], $grado, 'pendiente');

    // echo "El correo del usuario es: " . $_POST["correo"];
    $tempUserService = new UserServicio();

    //Primero que nada tenemos que verificar si el usuario ya existe en la base de datos
    if($tempUserService -> verificar($user)){
        //entonces mandar un mensaje de que el usuario ya existe, sin embargo hay que tener en cuenta el estado del usuario
        $status = 0;
        switch ($user -> getEstado()) {
            case 'pendiente':
                $status = 1;
                break;
            case 'permitido':
                $status = 2;
                break;
            case 'denegado': 
                $status = 3;
            default:
                $status = 0;
                break;
        }
        header("Location: registro.php?UserAlreadyExists=1&status=". $status ."");
        exit();
    }
    if($tempUserService -> registrar($user)){
       // echo "exito";     
        //Aca se genera el codigo de verificacion junto con el objeto para tener en cuenta las fechas
        $codigoServ = new CodigoVerificacionServicio();
        $idCodigo = $codigoServ -> generarCodigo(6);
        $fecha_creado = date('Y-m-d H:i:s');
        $fecha_expirado = date('Y-m-d H:i:s', strtotime('+10 minutes'));
        $estado = 'valido';

        $codigo = new CodigoVerificacion($idCodigo, $fecha_creado, $fecha_expirado, $estado, $user);

        //agregar el codigo a la bd
        $codigoServ -> insertar($codigo);
        
        $mailRegistro = new EmailRegistro(
            $user->getCorreo(),
            $user->getNombre(),
            $idCodigo
        );

        //faltaria enviar el codigo a la base de datos
        $mailRegistro -> enviarCorreo();
        $_SESSION["codigo"] = $codigo;
        header("Location: validarCodigo.php"); 
    }else{
        $error = true;
        header("Location: registro.php");
        die();
    }
}

?>

<body>
    <section class="container">
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
                    <img id="kopulso-login-img" src="../../img/kopulsoNOchiquito.png" alt="illustration" class="illustration" />
                </a>
                
                <h1 class="opacity">Registro</h1>
                <form action="registro.php" method="post">
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
                    if($CamposIncompletos){
                        ?>
                        <div class="alert alert-danger" role="alert">
                            Campos incompletos, por favor completalos...
                        </div>
                        <?php
                    }
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