<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Club Taekwondo - Profesores</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" href="ui/administrador/css/styles.css">
</head>
<body>
<?php 

include_once 'ui/administrador/componentes/navbar.php'; 

require_once 'Persistencia/DAO.php';
require_once 'Persistencia/GradoDAO.php';
require_once 'Persistencia/EstudianteDAO.php';
require_once 'Persistencia/UsuarioDAO.php';
require_once 'Persistencia/Conexion.php';
require_once 'business/Persona.php';
require_once 'business/Profesor.php';
require_once 'business/Estudiante.php';
require_once 'business/Usuario.php';
require_once 'business/Grado.php';
?>