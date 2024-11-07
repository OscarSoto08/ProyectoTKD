<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="kopulso, club de taekwondo, LTA, Learning Taekwondo Application"> 
    <title>LTA - Kopulso</title>

    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@400;700&display=swap" rel="stylesheet">
<!-- Jquery -->
  <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>  

    <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

  <!-- Datatables -->
  <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
  <!-- js del datatable -->
  <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">  
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=person_add" />
  <script src="userControl.js"></script>



  <link rel="stylesheet" href="css/profile.css">
</head> 

<?php
require 'model/model_persona/Persona.php';
require 'model/model_persona/Profesor.php';
require 'model/model_persona/Estudiante.php';
require 'model/model_persona/Administrador.php';
require 'model/model_persona/User.php';
require 'model/Grado.php';

require 'Persistencia/Conexion.php';
require 'Persistencia/DAO.php';
require 'Persistencia/personaDAO/ProfesorDAO.php';
require 'Persistencia/personaDAO/EstudianteDAO.php';
require 'Persistencia/personaDAO/AdministradorDAO.php';
require 'Persistencia/personaDAO/UserDAO.php';
require 'Persistencia/GradoDAO.php';

require 'service/persona/adminServicio.php';
require 'service/persona/estudianteServicio.php';
require 'service/persona/profesorServicio.php';
require 'service/persona/UserServicio.php';
require 'service/persona/gradoServicio.php';


if(session_status() == PHP_SESSION_NONE) session_start();
if (!isset($_SESSION['id'])) {
    header("Location: ?pid=". base64_encode('ui/session/pages/login.php'));
    exit; // Asegúrate de salir después de redirigir
}

$id = $_SESSION["id"];

$administrador = new Administrador($id);
$adminService = new AdminServicio();

$administrador = $adminService->consultarPorId($administrador);

require "admin_navbar.php";
?>