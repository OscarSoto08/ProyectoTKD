<?php 
require_once 'model/CodigoVerificacion.php';
require_once 'model/model_persona/User.php';
require_once 'model/Grado.php';
require_once 'model/model_persona/Administrador.php';
require_once 'model/model_persona/Profesor.php';
require_once 'model/signup_mail.php';

require_once 'Persistencia/DAO.php';
require_once 'Persistencia/Conexion.php';
require_once 'Persistencia/codigoVerificacionDAO.php';
require_once 'Persistencia/personaDAO/UserDAO.php';
require_once 'Persistencia/personaDAO/EstudianteDAO.php';
require_once 'Persistencia/GradoDAO.php';
require_once 'Persistencia/personaDAO/AdministradorDAO.php';
require_once 'Persistencia/personaDAO/ProfesorDAO.php';

require_once 'service/codigoVerificacionServicio.php';
require_once 'service/persona/UserServicio.php';
require_once 'service/persona/gradoServicio.php';
require_once 'service/persona/estudianteServicio.php';
require_once 'service/persona/adminServicio.php';
require_once 'service/persona/profesorServicio.php';

if(session_status() == PHP_SESSION_NONE) session_start();
