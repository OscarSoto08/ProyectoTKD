<?php

require 'model/model_persona/Persona.php';
require 'model/model_persona/Profesor.php';
require 'model/model_persona/Estudiante.php';
require 'model/model_persona/Administrador.php';
require 'model/model_persona/User.php';
require 'model/Grado.php';
require 'model/Evento.php';
require 'model/Galeria_Evento.php';

require 'Persistencia/Conexion.php';
require 'Persistencia/DAO.php';
require 'Persistencia/personaDAO/ProfesorDAO.php';
require 'Persistencia/personaDAO/EstudianteDAO.php';
require 'Persistencia/personaDAO/AdministradorDAO.php';
require 'Persistencia/personaDAO/UserDAO.php';
require 'Persistencia/GradoDAO.php';
require 'Persistencia/EventoDAO.php';
require 'Persistencia/Galeria_EventoDAO.php';

require 'service/persona/adminServicio.php';
require 'service/persona/estudianteServicio.php';
require 'service/persona/profesorServicio.php';
require 'service/persona/UserServicio.php';
require 'service/gradoServicio.php';
require 'service/EventoServicio.php';
require 'service/GaleriaEventoServicio.php';

if(session_status() == PHP_SESSION_NONE) session_start();
if (!isset($_SESSION['id']) || $_SESSION['tipoUsuario'] != 'administrador') {
    header("Location: ?pid=". base64_encode('ui/session/pages/login.php').'&cs='. base64_encode('true'));
    exit; // Asegúrate de salir después de redirigir
}
if(!$administrador = AdminServicio::consultarPorId($_SESSION['id'])){ //Si el administrador llega a eliminarse a si mismo
    session_destroy();
    header('Location: ?pid='. base64_encode('ui/session/pages/login.php'));
}

