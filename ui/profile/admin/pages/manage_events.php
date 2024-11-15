<?php 
require 'ui/profile/admin/components/admin_header.php';
include 'ui/profile/admin/components/modal_evento.php'; 
include 'ui/profile/admin/components/modal_galeria.php'; 
?>
<body>
    <div id="content">

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
    
    <h1 class="eventoid" style="display: none;">ID del evento: <?php echo $evento -> getId(); ?></h1>
    <h2><?php echo $evento -> getNombre(); ?></h2>
                
    <?php $carousel_cont = 0;         
    include 'ui/profile/admin/components/event_carousel.php'; ?>


                <p><?php echo $evento -> getDescripcion();?></p>
                <p>Fecha inicio: <?php echo $evento -> getFecha_inicio(); ?></p>
                <p class="<?php echo $evento -> getEstado() == 'vencido' ? 'red' : 'green' ?>"><?php echo strtoupper($evento -> getEstado()); ?></p>
                <p>Precio: $<?php echo $evento -> getPrecio(); ?></p>
                <h5 class="text-center">Gestionar</h5>
                <div class="d-flex">
                    <button type="button" class="mx-auto btn fill" data-bs-toggle="modal" data-bs-target="#modal_evento">Evento</button>
                    <button type="button" class="mx-auto btn fill" data-bs-toggle="modal" data-bs-target="#modal_galeria">Galeria</button>
                </div>

            </div>
        </div>
        <?php
       if ($i % 4 == 3) {
        echo "</div>";
            }
            $i ++;
        }
        if ($i % 4 != 0) {
            echo "</div>";
        }     
    ?>
    
    </div>

</body>
</html>