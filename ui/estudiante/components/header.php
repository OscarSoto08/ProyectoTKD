<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LTA - Kopulso</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="img/image.png">
    <link rel="stylesheet" href="ui/administrador/css/styles.css">
</head>

<?php 
require 'ui/estudiante/includes.php';

if(session_status()==PHP_SESSION_NONE) session_start();

if(empty($_SESSION['id']) || $_SESSION['tipoUsuario'] != 'estudiante') header('Location: ?cs='.base64_encode('true'));

$idEst = $_SESSION['id'];

$estudiante = Estudiante::consultarPorId($idEst);
include 'ui/estudiante/components/navbar.php'; 
?>