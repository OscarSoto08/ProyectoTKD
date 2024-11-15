<div id="carouselExample<?php echo $evento -> getId(); ?>" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
    <?php 
      $galeria = GaleriaEventoServicio::consultarPorIdEvento($evento);
      if(empty($galeria)){
    // Una imagen vacia por defecto ?>  
        <div class="carousel-item active">
            <img src="img/No_Image_Available.jpg" class="d-block w-100" alt="Imagen 1">
        </div>
    <?php
    }
      foreach($galeria as $imagen){
    ?>
    <!-- Para este caso el arreglo no estará vacio, así que se recorre as always -->
        <div class="carousel-item <?php echo $carousel_cont == 0 ? 'active': ''; ?>">
            <img src="<?php echo $imagen -> getImagen(); ?>" class="d-block w-100" alt="Imagen 1">
        </div>
        <?php
        $carousel_cont+=1;
      }
      ?>
      
    </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample<?php echo $evento->getId(); ?>" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Anterior</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample<?php echo $evento->getId(); ?>" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Siguiente</span>
        </button>
    </div>