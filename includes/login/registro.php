<?php 
require '../../service/persona/estudianteServicio.php';
require '../../service/persona/gradoServicio.php';
require '../../Persistencia/Conexion.php';
require '../../Persistencia/EstudianteDAO.php';
require '../../Persistencia/GradoDAO.php';
require '../../model/Grado.php';
require '../../model/tempUser.php';
require '../../';
//Lectura de datos
$grado = null;
$gradoServ = new GradoServicio();
if(isset($_POST['ingresar'])){
    if($_POST["rol"] == "estudiante"){
        $idGrado = $_POST["grado"];
        $grado = new Grado($idGrado);
        $gradoServ->consultar($grado);
    }
    $user = new TempUser(null, $_POST["nombre"], $_POST["apellido"], $_POST["correo"], $_POST["clave"], null, null, $_POST["rol"], $grado);

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
    <script src="js/script.js" ></script>

    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>


    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/login.css">

    <script>
        window.onload = function() {
            window.scrollTo(0, 0);
        };
    </script>
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
                    <input id="nombre" name="nombre" type="text" placeholder="NOMBRES" />
                    <input type="text" name="apellido" placeholder="APELLIDOS" />
                    <label for="fNac">Fecha de nacimiento</label> 
                    <input id="fNac" type="date" placeholder="FECHA DE NACIMIENTO" />
                    <label for="correo">Datos de Login</label>
                    <input id="correo" type="text" placeholder="CORREO" />
                    <!-- <label for="password">Contraseña</label> -->
                    <input id="password" type="password" placeholder="CONTRASEÑA" />
                    <label for="estudiante">Soy...</label>
                    <div class="radio">
                        <input type="radio" id="estudiante" name="rol" value="estudiante" onclick="cargarGrados()">
                        <h5>Estudiante</h5>
                    </div>

                    <div class="radio">
                        <input type="radio" id="profesor" name="rol" value="profesor" onclick="ocultarGrados()">
                        <h5>Profesor</h5> 
                    </div>
                    <div id="grado" style="display: none;">
                        <label for="grado">Selecciona tu grado:</label>
                        <select name="grado" class="form-select mb-4" id="selectGrado">
                            <?php 
                            $grados = $gradoServ -> getTodosLosGrados();
                            foreach ($grados as $grado) {
                                echo '<option value="'. $grado -> getIdGrado() .'">'. $grado -> getNombre() .'</option>
                                '; 
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
1. Terminar de colocar el atributo name en los campos
2. Agregar el campo de fecha de nacimiento en persona
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