<?php 
require '../../../business/Evento.php';
require '../../../Persistencia/Conexion.php';
require '../../../Persistencia/DAO.php';
require '../../../Persistencia/EventoDAO.php';
?>
<main>
    <div class="timeline">
        <?php 
        $i = 0;
        foreach(Evento::consultarTodos() as $evento){
            $i++;
            echo "<div class='timeline-item'>
                <div class='timeline-content'>
                    <h2>{$evento->getNombre()}</h2>
                    <p>{$evento->getDescripcion()}</p>
                    <span class='date'>{$evento->getFecha_inicio()}</span>
                </div>
            </div>";
        }
        ?>
    </div>
</main>