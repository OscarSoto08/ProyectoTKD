<?php 
require 'ui/profile/admin/components/admin_header.php';
include 'ui/profile/admin/components/modal_evento.php'; 
include 'ui/profile/admin/components/modal_galeria.php'; 
?>
<body>
<div style="text-align: center; margin-top: 20px;"> <!-- Añadido un contenedor con centrado -->
    <button class="btn outline" data-bs-toggle="modal" data-bs-target="#modal_evento">
        <svg style="width: 30px; height: 30px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
            <path fill="#5c5050" d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 144L48 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l144 0 0 144c0 17.7 14.3 32 32 32s32-14.3 32-32l0-144 144 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-144 0 0-144z"/>
        </svg> AGREGAR EVENTO
    </button>
</div>
<div id="content">
    <?php 
    $eventService = new EventoServicio();
    $eventos = $eventService->consultarTodos();
    $galService = new GaleriaEventoServicio();
    $i = 0;
    foreach ($eventos as $evento) {
        if ($i % 4 == 0) {
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
                    <button type="button" id="btn_modal_evento" class="mx-auto btn fill" data-bs-toggle="modal" data-bs-target="#modal_evento">Evento</button>
                    <button type="button" id="btn_modal_galeria" class="mx-auto btn fill" data-bs-toggle="modal" data-bs-target="#modal_galeria">Galeria</button>
                </div>

            </div>
        </div>
        <?php
        if ($i % 4 == 3) {
            echo "</div>";
        }
        $i++;
    }
    if ($i % 4 != 0) {
        echo "</div>";
    }     
    ?>

</div>
</body>
