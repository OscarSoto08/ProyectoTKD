<?php require 'head/header.php';?>
<link rel="stylesheet" href="../css/style.css"/>
</head> 
<body>
<?php 
session_start();
if (!isset($_SESSION['id'])) {header("Location: login.php");}
$id = $_SESSION["id"];
require '../logica/Persona.php';
require '../logica/Administrador.php';
echo "id: ".$id;
?>
<?php require 'head/navbar.php';?>
    <h1>BIENVENIDO ADMINISTRADOR</h1>
</body>
</html>