<?php
namespace Heptagon\Core;

abstract class Component {
    protected $children = array();

    protected $styles = '';

    abstract public function run(App $app);

    public function addComponent(Component $c, string $name = null) {
        if (!$name) {
            array_push($this->children, $c);
        } else {
            $this->children[$name] = $c;
        }
    }

    public function getComponent(string $name) {
        return $this->children[$name];
    }
}
?>