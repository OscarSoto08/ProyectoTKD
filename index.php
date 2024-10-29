<?php require 'includes/head/header.php';?>
<body>
    <?php 
    session_start();
    if (isset($_GET['cerrarSesion'])) {
        session_destroy();
    }
    ?>
    <div id="datos">
        <div class="row mb-10 container mx-auto">
            <div class="col container">
                <?php require_once 'includes/head/navbar.php'?>
                <!-- CONTENIDO DINAMICO -->
                <div class="card border-dark p-8" id="content">
                </div>
            </div>
        </div>
    </div>
</body>
</html>
