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
    $eventos = EventoServicio::consultarTodos();
    $i = 0;
    foreach ($eventos as $evento) {
        if ($i % 4 == 0) {
            echo ' <div class="row p-5">';
        }
        ?>

    <div class="col-md-3">
    <div class="container">                 
    
    <h1 class="eventoid" style="display: none;"><?php echo $evento -> getId(); ?></h1>
    <h2 class="fecha_fin_ev"> <span class="nombre_ev"><?php echo $evento -> getNombre(); ?></span></h2>
                
    <?php $carousel_cont = 0;         
    include 'ui/profile/admin/components/event_carousel.php'; ?>

<!-- Cada elemento que tenga una clase que termine en ev quiere decir que pertenece al container de evento y no al modal -->
                <p><span class="descripcion_ev"><?php echo $evento -> getDescripcion();?></span></p>
                <p>Fecha inicio: <span class="fecha_inicio_ev"><?php echo $evento -> getFecha_inicio(); ?></span></p>
                <p>Fecha fin: <span class="fecha_fin_ev"><?php echo $evento -> getFecha_fin(); ?></span></p>
                <p class="<?php echo $evento -> getEstado() == 'vencido' ? 'red' : 'green' ?>"><span class="estado_ev"><?php echo $evento -> getEstado(); ?></span></p>
                <p>Precio: $<span class="precio_ev"><?php echo $evento -> getPrecio(); ?></span></p>
                <p>Ciudad: <span class="ciudad_ev"><?php echo $evento -> getCiudad(); ?></span></p>
                <h5 class="text-center">Gestionar</h5>
                <div class="d-flex">
                    <button type="button" class="mx-auto btn fill btn_modal_evento" data-bs-toggle="modal" data-bs-target="#modal_evento">Evento</button>
                    <button type="button" class="mx-auto btn fill btn_modal_galeria" data-bs-toggle="modal" data-bs-target="#modal_galeria">Galeria</button>
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
    <script src="js/eventControl.js"></script>
</body>
