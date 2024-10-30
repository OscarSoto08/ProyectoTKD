
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LTA Kopulso</title>
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

<?php 
require '../../model/Grado.php';
require '../../model/model_persona/User.php';
require '../../model/CodigoVerificacion.php';
require '../../model/model_persona/Administrador.php';

require '../../Persistencia/DAO.php';
require '../../Persistencia/Conexion.php';
require '../../Persistencia/personaDAO/EstudianteDAO.php';
require '../../Persistencia/GradoDAO.php';
require '../../Persistencia/personaDAO/UserDAO.php';
require '../../Persistencia/codigoVerificacionDAO.php';
require '../../Persistencia/personaDAO/AdministradorDAO.php';


require '../../service/persona/estudianteServicio.php';
require '../../service/persona/gradoServicio.php';
require '../../service/persona/UserServicio.php';
require '../../service/codigoVerificacionServicio.php';
require '../../service/persona/adminServicio.php';

require 'emailRegistro.php';

if(session_status() == PHP_SESSION_NONE) session_start();
?>
