<?php 
require 'ui/estudiante/components/header.php';
?>
<style>
    
    :root {
        --primary: <?php echo $primary_color[$estudiante->getGrado()]; ?>;
        --secondary: <?php echo $secondary_color[$estudiante->getGrado()]; ?>;
    }

    
</style>
<body>
    <div class="container">
        <h1>Cursos disponibles</h1>
        <div class="row">
            <div class="col">
                <div class="container"><a href="?pid=<?php echo base64_encode('ui/estudiante/pages/subcurso.php');?>">Combate</a></div>
            </div>
            <div class="col">
                <div class="container"><a href="">Poomsae</a></div>
            </div>
            <div class="col">
                <div class="container"><a href="">Terminologia</a></div>
            </div>
            <div class="col">
                <div class="container"><a href="">Defensa Personal</a></div>
            </div>
        </div>
        
        <?php include 'ui/estudiante/components/carousel.php'?>
    
    </div>

    

</body>
</html>
