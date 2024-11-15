<?php
class Ciudad{
    private $id;
    private $nombre;
    private $pais;
    public function __construct($id = NULL, $nombre = NULL, $pais = NULL){
        $this->id = $id;
        $this->nombre = $nombre;
        $this->pais = $pais;
    }
}