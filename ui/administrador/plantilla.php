<?php

require 'includes.php';
$header = new Header(css:["css/profile.css","css/navbar.css"], js:[]);
$header -> render();

$navbar = new Navbar(nav_items:[

  //?Izquierda
    new Navitem(posicion: 'izquierda', contenido: ['Inicio']),
    new Navitem(posicion: 'izquierda', contenido: ['Eventos']),

  //?Centro
    new Navitem(posicion: 'centro', contenido: ['Profesores'], getParams: [
      "pid" => base64_encode("ui/administrador/pages/manage_users.php"),
      "rol" => "1"
    ]),
    new Navitem(posicion: 'centro', contenido: ['Estudiantes'], getParams: [
      "pid" => base64_encode("ui/administrador/pages/manage_users.php"),
      "rol" => "2"
    ]),
    new Navitem(posicion: 'centro', contenido: ['Administradores'], getParams: [
      "pid" => base64_encode("ui/administrador/pages/manage_users.php"),
      "rol" => "3"
    ]),

  //?Derecha
    new DropdownMenu(posicion:'derecha',titulo:'Mi perfil: Administrador', items: [
      new DropdownItem("Mi cuenta", ['pid' => '#']),
      new DropdownItem("Cerrar sesion", ['cs' => base64_encode("true")])
    ])


], home_url: "ui/administrador/index.php", titulo: "{$administrador->getNombre()} {$administrador->getApellido()}");
$navbar -> render();

?>

<div class="mb-5 container">
 <div class="wrapper">
 <div class="banner-image mb-3"> <img src="https://i.ibb.co/1TLZ2Tg/rhino-Adult.png" alt="rhino-Adult" border="0"></div>
   <h1> <?php echo $administrador -> getNombre() . ' '. $administrador -> getApellido() ; ?></h1>
   <p><?php echo $administrador-> getCorreo(); ?></p>
  </div>
  <div class="button-wrapper"> 
  <?php 
    $btn = new Button(type: "button", class: ["btn", "outline"], text: "CONFIGURACIÓN");
    $btn->render();
    $btn->setText("MIS AUDITORIAS"); $btn -> setClass(["btn", "fill"]);
    $btn->render();
  ?>
  </div>
  </div>
</div>
<?php
$header -> close();