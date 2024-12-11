<?php
class Button{
    private $type;
    private $class;
    private $value;
    private $name;
    private $text;

    public function __construct($type = "", $class = [], $value = "", $name = "", $text = ""){
        $this -> type = $type;
        $this -> class = $class;
        $this -> value = $value;
        $this -> name = $name;
        $this -> text = $text;
    }

    public function render(){
        
    }

    public function getButton(){
        $classes = implode(' ', $this->class);
        return "<button type='{$this->type}' class='{$classes}' value='{$this->value}' name='{$this->name}' id='{$this->name}'>{$this->text}</button>";
    }
}