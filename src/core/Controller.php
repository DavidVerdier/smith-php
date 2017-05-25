<?php
namespace core;

abstract class Controller {

    public function execute() {
        $this->init();
        $this->run();
    }

    public function init() {}

    public abstract function run();
}
?>