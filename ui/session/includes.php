<?php 
require_once 'model/CodigoVerificacion.php';
require_once 'model/Grado.php';
require_once 'model/model_persona/Usuario.php'; #clase padre
require_once 'model/model_persona/Administrador.php';
require_once 'model/model_persona/Profesor.php';
require_once 'model/model_persona/Estudiante.php';
require_once 'model/Signup_Mail.php';

require_once 'Persistencia/DAO.php';
require_once 'Persistencia/Conexion.php';
require_once 'Persistencia/codigoVerificacionDAO.php';
require_once 'Persistencia/personaDAO/UserDAO.php';
require_once 'Persistencia/personaDAO/EstudianteDAO.php';
require_once 'Persistencia/GradoDAO.php';
require_once 'Persistencia/personaDAO/AdministradorDAO.php';
require_once 'Persistencia/personaDAO/ProfesorDAO.php';

require_once 'service/codigoVerificacion_Servicio.php';
require_once 'service/Grado_Servicio.php';
require_once 'service/persona/Estudiante_Servicio.php';
require_once 'service/persona/Administrador_Servicio.php';
require_once 'service/persona/Profesor_Servicio.php';

if(session_status() == PHP_SESSION_NONE) session_start();
