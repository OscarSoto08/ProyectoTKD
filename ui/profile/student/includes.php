<?php 
require 'model/model_persona/Persona.php';
require 'model/model_persona/Estudiante.php';
require 'model/Grado.php';

require 'service/persona/estudianteServicio.php';
require 'service/gradoServicio.php';

require 'Persistencia/DAO.php';
require 'Persistencia/Conexion.php';
require 'Persistencia/personaDAO/EstudianteDAO.php';
require 'Persistencia/GradoDAO.php';


//constante global 

$primary_color = [
    "1" => "#FFF",
    "9" => "red"
];

$secondary_color = [
    "1" => "#000",
    "9" => "white"
];