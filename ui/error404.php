<?php require 'ui/home/components/navbar.php'; ?>
<?php require 'ui/home/components/head.php'; ?>
<style>
    body {
        font-size: 16px;
        background: none;
        position: relative; /* Necesario para que el pseudo-elemento 'after' funcione correctamente */
    }
    body:after {
        content: '';
        background: url('img/kopulsoNochiquito.png') no-repeat center center;
        background-size: 45%; /* Ajusta el tamaño de la imagen según tus necesidades */
        opacity: 0.5; /* Ajusta la opacidad para que sea más sutil */
        z-index: -1; /* Asegura que la imagen esté detrás del contenido */
        pointer-events: none; /* Asegura que la imagen no interfiera con la interacción */
        user-select: none; /* Evita que la imagen se pueda seleccionar */
        position: absolute; /* Asegura que el pseudo-elemento se posicione sobre el cuerpo */
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 100%; /* Asegura que la imagen cubra todo el fondo */
        height: 100%; /* Asegura que la imagen cubra todo el fondo */
    }
    .container {
        background-color: rgba(255, 255, 255, 0.6); /* Fondo semitransparente */
        width: 100%; /* Ancho del contenedor */
        height: 80vh; /* Altura fija para habilitar el desplazamiento interno */
        padding: 10px 0; /* Espaciado interno */
        box-shadow: 1px -1px 15px 2px #0a0a23; /* Sombra para dar efecto de elevación */
        border-radius: 10px; /* Esquinas redondeadas */
        display: flex; /* Flexbox para el contenido del contenedor */
        flex-direction: column; /* Organiza los elementos en columna */
        overflow-y: auto; /* Permite el desplazamiento vertical dentro del contenedor */
        scroll-behavior: smooth;
        align-items: center;
        justify-content: center;
    }
</style>
<body>
    <div class="container">
        <h1>Error 404</h1>
        <h3 style="margin: 0;">No logramos encontrar el sitio que estás buscando</h3>
        <h4>Si consideras que se trata de un error <a href="#">Contactanos</a></h4>
    </div>
</body>
</html>
