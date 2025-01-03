<?php 
$ruta = explode("/",$_SERVER["SCRIPT_NAME"]); 
//  foreach ($ruta as $key){ echo "<h1>$key</h1>";}
$script_actual = $ruta[count($ruta)-1];
?>

<!-- Cabecera -->
<header class="bg-primary text-white py-3">
    <div class="container d-flex justify-content-between align-items-center">
        <h1 class="h3">¡Bienvenido, <?php echo $estudiante -> getUsername(); ?>!</h1>
        <a href="?cs=<?php echo base64_encode("true")?>" class="btn btn-light">Cerrar Sesión</a>
    </div>
</header>