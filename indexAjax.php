<?php

require_once 'ui/administrador/includes.php';

$ruta = (isset($_GET['ruta'])) ? $_GET['ruta'] : $_POST["ruta"];
include $ruta;