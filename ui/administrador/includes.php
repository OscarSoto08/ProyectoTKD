<?php

require 'business/Persona.php';
require 'business/Profesor.php';
require 'business/Estudiante.php';
require 'business/Administrador.php';
require 'business/Usuario.php';
require 'business/Grado.php';
require 'business/Evento.php';
require 'business/Galeria_Evento.php';

require 'Persistencia/Conexion.php';
require 'Persistencia/DAO.php';
require 'Persistencia/ProfesorDAO.php';
require 'Persistencia/EstudianteDAO.php';
require 'Persistencia/AdministradorDAO.php';
require 'Persistencia/UsuarioDAO.php';
require 'Persistencia/GradoDAO.php';
require 'Persistencia/EventoDAO.php';
require 'Persistencia/Galeria_EventoDAO.php';

if(session_status() == PHP_SESSION_NONE) session_start();
if (empty($_SESSION['id']) || $_SESSION['tipoUsuario'] != 'administrador') {
    header("Location: ?pid=". base64_encode('ui/session/pages/login.php').'&cs='. base64_encode('true'));
    exit; // Asegúrate de salir después de redirigir
}
if(!$administrador = Administrador::consultarPorId($_SESSION['id'])){ //Si el administrador llega a eliminarse a si mismo
    session_destroy();
    header('Location: ?pid='. base64_encode('ui/session/pages/login.php'));
}