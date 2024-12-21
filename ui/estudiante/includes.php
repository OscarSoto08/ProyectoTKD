<?php 
require 'business/Persona.php';
require 'business/Estudiante.php';
require 'business/Grado.php';

require 'Persistencia/DAO.php';
require 'Persistencia/Conexion.php';
require 'Persistencia/EstudianteDAO.php';
require 'Persistencia/GradoDAO.php';


//constante global 

$primary_color = [
    "1" => "#FFF",
    "9" => "red"
];

$secondary_color = [
    "1" => "black",
    "9" => "white"
];