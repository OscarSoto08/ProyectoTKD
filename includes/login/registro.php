<?php 
require '../../service/persona/estudianteServicio.php';
require '../../service/persona/gradoServicio.php';
require '../../service/persona/tempUserServicio.php';
require '../../Persistencia/Conexion.php';
require '../../Persistencia/EstudianteDAO.php';
require '../../Persistencia/GradoDAO.php';
require '../../Persistencia/tempUserDAO.php';
require '../../model/Grado.php';
require '../../model/tempUser.php';

require '../login/emailRegisto.php';

// Lectura de datos
$grado = null;
$gradoServ = new GradoServicio();

//Servicio de usuarios
$CamposIncompletos = false;

if (isset($_POST['ingresar'])) {
    // Verifica que cada campo esté definido y no esté vacío
    if (empty($_POST["nombre"]) || empty($_POST["apellido"]) || empty($_POST["correo"]) || empty($_POST["clave"]) || empty($_POST["fNac"]) || empty($_POST["rol"])) {
        $CamposIncompletos = true;
        header("Location: registro.php");
        exit; // Detener la ejecución si hay campos incompletos
    }

    // Verifica si el campo "rol" está definido
    if (isset($_POST["rol"]) && $_POST["rol"] == "estudiante") {
        $idGrado = $_POST["grado"];
        $grado = new Grado($idGrado);
        $gradoServ->consultar($grado);
    }

    $user = new TempUser(null, $_POST["nombre"], $_POST["apellido"], $_POST["correo"], md5($_POST["clave"]), null, null, $_POST["fNac"], $_POST["rol"], $grado);
    // echo "El correo del usuario es: " . $_POST["correo"];
    $tempUserService = new TempUserServicio();
    if($tempUserService -> registrar($user)){
       // echo "exito";
        $codigo = rand(100000, 999999);
        $mailRegistro = new EmailRegistro(
            $user->getCorreo(),
            $user->getNombre(),
            $codigo
        );
        $mailRegistro->enviarCorreo();
    }else{
        $error = true;
        echo "error";
    }
    
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@400;700&display=swap" rel="stylesheet">

    <!-- JQUERY -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/script.js"></script>

    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/login.css">
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