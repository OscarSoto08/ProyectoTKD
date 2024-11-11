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
require 'service/gradoServicio.php';