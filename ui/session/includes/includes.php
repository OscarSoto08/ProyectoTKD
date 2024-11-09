<?php 
require 'model/Grado.php';
require 'model/model_persona/User.php';
require 'model/CodigoVerificacion.php';
require 'model/model_persona/Administrador.php';
require 'model/signup_mail.php';
require 'model/model_persona/Profesor.php';

require 'Persistencia/DAO.php';
require 'Persistencia/Conexion.php';
require 'Persistencia/personaDAO/EstudianteDAO.php';
require 'Persistencia/GradoDAO.php';
require 'Persistencia/personaDAO/UserDAO.php';
require 'Persistencia/codigoVerificacionDAO.php';
require 'Persistencia/personaDAO/AdministradorDAO.php';
require 'Persistencia/personaDAO/ProfesorDAO.php';

require 'service/persona/estudianteServicio.php';
require 'service/persona/gradoServicio.php';
require 'service/persona/UserServicio.php';
require 'service/codigoVerificacionServicio.php';
require 'service/persona/adminServicio.php';
require 'service/persona/profesorServicio.php';

if(session_status() == PHP_SESSION_NONE) session_start();
