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
        $classes = implode(' ', $this->class);
        echo "<button type='{$this->type}' class='{$classes}' value='{$this->value}' name='{$this->name}' id='{$this->name}'>{$this->text}</button>";
    }

    public function getButton(){
        $classes = implode(' ', $this->class);
        return "<button type='{$this->type}' class='{$classes}' value='{$this->value}' name='{$this->name}' id='{$this->name}'>{$this->text}</button>";
    }

    // Getters
    public function getType() { return $this->type; }
    public function getClass() { return $this->class; }
    public function getValue() { return $this->value; }
    public function getName() { return $this->name; }
    public function getText() { return $this->text; }

    // Setters
    public function setType($type) { $this->type = $type; }
    public function setClass($class) { $this->class = $class; }
    public function setValue($value) { $this->value = $value; }
    public function setName($name) { $this->name = $name; }
    public function setText($text) { $this->text = $text; }

}