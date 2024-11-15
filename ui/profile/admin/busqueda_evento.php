<?php 

require '../../../model/Evento.php';
require '../../../model/Galeria_Evento.php';
require '../../../Persistencia/Conexion.php';
require '../../../Persistencia/DAO.php';
require '../../../Persistencia/EventoDAO.php';
require '../../../Persistencia/Galeria_EventoDAO.php';
require '../../../service/EventoServicio.php';
require '../../../service/GaleriaEventoServicio.php';

$texto = filter_input(INPUT_POST, 'texto', FILTER_SANITIZE_STRING) ?? '';

$data = ''; // Lo que se va a devolver
header('Content-Type: application/json');

if ($eventos = EventoServicio::filtrar($texto)) {
    $i = 0;
    foreach ($eventos as $evento) {
        if ($i % 4 == 0) {
            $data .= "<div class='row p-5'>";
        }
          
        $data .= "<div class='col-md-3'>";
        $data .= '<div class="container">';
        $data .= '<h1 style="display: none";>ID del evento: <span class="eventoid">'. $evento -> getId() .'</span></h1>';
        $data .= '<h2> <span class="nombre_ev">' . $evento->getNombre() . '</span></h2>';

        // Aquí empieza el carrusel
        $carousel_cont = 0;
        $data .= '<div id="carouselExample' . $evento->getId() . '" class="carousel slide" data-bs-ride="carousel">';
        $data .= '<div class="carousel-inner">';
      
        $galeria = GaleriaEventoServicio::consultarPorIdEvento($evento);
        if (empty($galeria)) {
            $data .= '<div class="carousel-item active">';
            $data .= '<img src="img/No_Image_Available.jpg" class="d-block w-100" alt="Imagen 1"></div>';
        }
        foreach ($galeria as $imagen) {
            $data .= '<div class="carousel-item ' . ($carousel_cont == 0 ? 'active' : '') . '">';
            $data .= '<img src="' . $imagen->getImagen() . '" class="d-block w-100" alt="Imagen 1"></div>';
            $carousel_cont++;
        }

        $data .= '</div>';
        $data .= '<button class="carousel-control-prev" type="button" data-bs-target="#carouselExample' . $evento->getId() . '" data-bs-slide="prev">';
        $data .= '<span class="carousel-control-prev-icon" aria-hidden="true"></span>';
        $data .= '<span class="visually-hidden">Anterior</span></button>';
        $data .= '<button class="carousel-control-next" type="button" data-bs-target="#carouselExample' . $evento->getId() . '" data-bs-slide="next">';
        $data .= '<span class="carousel-control-next-icon" aria-hidden="true"></span><span class="visually-hidden">Siguiente</span></button></div>';

        $data .= '<p> <span class="descripcion_ev">' . $evento->getDescripcion() . '</span></p>';
        $data .= '<p>Fecha inicio: <span class="fecha_inicio_ev">' . $evento->getFecha_inicio() . '</span></p>';
        $data .= '<p>Fecha fin: <span class="fecha_fin_ev">' . $evento->getFecha_fin() . '</span></p>';
        $data .= '<p class="' . ($evento->getEstado() == 'VENCIDO' ? 'red' : 'green') . '"> <span class="estado_ev">' . $evento->getEstado() . '</span></p>';
        $data .= '<p>Precio: $<span class="precio_ev">' . $evento->getPrecio() . '</span></p>';
        $data .= '<p>Ciudad: <span class="ciudad_ev">' . $evento->getCiudad() . '</span></p>';
        $data .= '<h5 class="text-center">Gestionar</h5>';
        $data .= '<div class="d-flex">
                    <button type="button" class="mx-auto btn fill btn_modal_evento" data-bs-toggle="modal" data-bs-target="#modal_evento">Evento</button>
                    <button type="button" class="mx-auto btn fill btn_modal_evento" data-bs-toggle="modal" data-bs-target="#modal_galeria">Galeria</button>
                    </div>';
        $data .= '</div></div>';

        if ($i % 4 == 3) {
            $data .= "</div>";
        }
        $i++;
    }
    if ($i % 4 != 0) {
        $data .= "</div>";
    }
} else {
    $data = '<div class="container"><h1>No encontramos tu búsqueda</h1></div>';
}

$respuesta = [
    "data" => $data
];

echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
?>
