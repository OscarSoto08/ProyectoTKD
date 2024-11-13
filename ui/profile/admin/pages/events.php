<?php require 'ui/profile/admin/components/admin_header.php';?>
<body>
    <div class="row p-3">
        <div class="col-md-6">
            <div class="container">

                <a href="?pid=<?php echo base64_encode('ui/profile/admin/pages/manage_events.php'); ?>" style="max-width: 100px;" class="btn outline mx-auto">Ok</a>
            </div>
        </div>
        <div class="col-md-6">
            <div class="container">
                <a href="?pid=<?php echo base64_encode('ui/profile/admin/pages/manage_gallery.php'); ?>" style="max-width: 100px;" class="btn outline mx-auto">Ok</a>
            </div>
        </div>
    </div>
    <?php 
    $eventService = new EventoServicio();
    $eventos = $eventService->consultarTodos();
    $galService = new GaleriaEventoServicio();
    $i = 0;
    foreach ($eventos as $evento) {
        if($i % 4 == 0){
            echo ' <div class="row p-5">';
        }
        ?>
        <div class="col-md-3">
            <div class="container">
                
                <h2><?php echo $evento -> getNombre(); ?></h2>

            
    <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <?php 
      $galeria = $galService -> consultarPorIdEvento($evento);
      foreach($galeria as $imagen){
        ?>
        <div class="carousel-item <?php echo $imagen -> getIdGaleria() == 1 ? 'active': ''; ?>">
            <img src="<?php echo $imagen -> getImagen(); ?>" class="d-block w-100" alt="Imagen 1">
        </div>
        <?php
      }
      ?>
      
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Anterior</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Siguiente</span>
    </button>
  </div>




                <p><?php echo $evento -> getDescripcion();?></p>
                <p>Fecha inicio: <?php echo $evento -> getFecha_inicio(); ?></p>
                <p class="<?php echo $evento -> getEstado() == 'vencido' ? 'red' : 'green' ?>"><?php echo strtoupper($evento -> getEstado()); ?></p>
                <p>Precio: $<?php echo $evento -> getPrecio(); ?></p>
            </div>
        </div>
        <?php
        if($i % 3 == 0 || $i == count($eventos) - 1) {
            echo '</div>';
        }
        $i++;
    }
    ?>
</body>
</html>