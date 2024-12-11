<?php 
require_once 'business/CodigoVerificacion.php';
require_once 'business/Grado.php';
require_once 'business/Persona.php';
require_once 'business/Usuario.php'; 
require_once 'business/Administrador.php';
require_once 'business/Profesor.php';
require_once 'business/Estudiante.php';
require_once 'business/Signup_Mail.php';

require_once 'Persistencia/DAO.php';
require_once 'Persistencia/Conexion.php';
require_once 'Persistencia/codigoVerificacionDAO.php';
require_once 'Persistencia/UsuarioDAO.php';
require_once 'Persistencia/EstudianteDAO.php';
require_once 'Persistencia/GradoDAO.php';
require_once 'Persistencia/AdministradorDAO.php';
require_once 'Persistencia/ProfesorDAO.php';

if(session_status() == PHP_SESSION_NONE) session_start();
