<?php 
class Header{
  private $titulo;
  private $logo;
  private $css;
  private $js;

public function __construct($titulo = "LTA - Kopulso", $logo = "img/image.png", $css = [], $js = []) {
$this->titulo = $titulo;
$this->logo = $logo;
$this->css = $css;
$this->js = $js;
}

public function render() {

$cssLinks = implode("\n", array_map(function($css){
    return "<link rel='stylesheet' href='{$css}' />"; 
}, $this->css));

$jsScripts = implode("\n", array_map(function($js){
    return "<script src='{$js}'></script>"; 
}, $this->js));

echo "
<!DOCTYPE html>
<html lang='es'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel='preconnect' href='https://fonts.googleapis.com'>
    <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
    <link href='https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@400;700&display=swap' rel='stylesheet'>

    <!-- JQUERY -->
    <script src='https://code.jquery.com/jquery-3.6.0.min.js'></script>
    <!-- BOOTSTRAP -->

    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css' rel='stylesheet'>
    <script src='https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js'></script>
    
    <title>{$this->titulo}</title>
    <link rel='shortcut icon' href='{$this->logo}'>
    {$cssLinks}
    {$jsScripts}
</head>
<body>";
}

public function close(){
echo "</body>
</html>";
}
}