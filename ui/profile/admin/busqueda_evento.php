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
$evento_serv = new EventoServicio();
$galService = new GaleriaEventoServicio();

header('Content-Type: application/json');

if ($eventos = $evento_serv->filtrar($texto)) {
    $i = 0;
    foreach ($eventos as $evento) {
        if ($i % 4 == 0) {
            $data .= "<div class='row p-5'>";
        }

        $data .= "<div class='col-md-3'>";
        $data .= '<div class="container">';
        $data .= '<h1 class="eventoid" style="display: none";>ID del evento: '. $evento -> getId() .'</h1>';
        $data .= '<h2>' . $evento->getNombre() . '</h2>';

        // Aquí empieza el carrusel
        $carousel_cont = 0;
        $data .= '<div id="carouselExample' . $evento->getId() . '" class="carousel slide" data-bs-ride="carousel">';
        $data .= '<div class="carousel-inner">';
      
        $galeria = $galService->consultarPorIdEvento($evento);
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

        $data .= '<p>' . $evento->getDescripcion() . '</p>';
        $data .= '<p>Fecha inicio: ' . $evento->getFecha_inicio() . '</p>';
        $data .= '<p class="' . ($evento->getEstado() == 'vencido' ? 'red' : 'green') . '">' . strtoupper($evento->getEstado()) . '</p>';
        $data .= '<p>Precio: $' . $evento->getPrecio() . '</p>';
        $data .= '<h5 class="text-center">Gestionar</h5>';
        $data .= '<div class="d-flex">
                    <button type="button" class="mx-auto btn fill" data-bs-toggle="modal" data-bs-target="#modal_evento">Evento</button>
                    <button type="button" class="mx-auto btn fill" data-bs-toggle="modal" data-bs-target="#modal_galeria">Galeria</button>
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
