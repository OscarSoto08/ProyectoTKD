<?php
class Navbar{
private $home_url;
private $nav_items;
public function __construct($nav_items = [], $home_url = ''){
  $this->nav_items = $nav_items;
  $this -> home_url = $home_url;
}
public function render(){

  $left_nav_items = implode(' ',array_map(function($nav_item){
    if($nav_item -> getPosicion() == 'izquierda'){
      return $nav_item -> getNavItem();
    }
  }, $this->nav_items));

  $center_nav_items = implode('',array_map(function($nav_item){
    if($nav_item -> getPosicion() == 'centro'){
      return $nav_item -> getNavItem();
    }
  }, $this->nav_items));

  $right_nav_items = implode(' ',array_map(function($nav_item){
    if($nav_item -> getPosicion() == 'derecha'){
      return $nav_item -> getNavItem();
    }
  }, $this->nav_items));

    echo "
  <nav class='mb-5 navbar navbar-expand-lg bg-dark' data-bs-theme='dark'>
  <div class='container-fluid' style='color: white;'>
    <div class='d-flex flex-column justify-content-center align-items-center mx-4'>
    <a class='navbar-brand  mx-3' href='". (($this -> home_url == '') ? '?' : "?pid=" . base64_encode($this -> home_url)) ."'>
      <img src='img/image.png' alt='' style='width: 40px; height: 40px;' srcset=''>
    </a>
    LTA - KOPULSO
    </div>
    <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarSupportedContent' aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'>
      <span class='navbar-toggler-icon'></span>
    </button>
    <div class='collapse navbar-collapse' id='navbarSupportedContent'>
      <ul class='navbar-nav me-auto mb-2 mb-lg-0' id='opciones-navbar'>
        {$left_nav_items}
      </ul>
      <ul class='navbar-nav' style='margin-right: auto;'>
        {$center_nav_items}
      </ul>
      <ul class='right navbar-nav mr-auto mb-2 mb-lg-0'>
        {$right_nav_items}
      </ul>
    </div>
  </div>
</nav>
";
}
}