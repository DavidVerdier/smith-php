<?php
namespace Smith\Template;

abstract class Component {
    protected $children = array();

    abstract public function render();

    public function set(string $name, Component $c) {
        $this->children[$name] = $c;
    }

    public function add(Component $c) {
        array_push($this->children, $c);
    }

    public function get(string $name) {
        return $this->children[$name];
    }
}
?>