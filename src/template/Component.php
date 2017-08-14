<?php
namespace Smith\Template;

abstract class Component {
    protected $children = array();

    abstract public function render();

    public function set(string $position, Component $c) {
        $this->children[$position] = $c;
    }

    public function add(Component $c) {
        array_push($this->children, $c);
    }

    public function get(string $position) {
        return $this->children[$position];
    }
}
?>
