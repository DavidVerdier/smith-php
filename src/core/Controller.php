<?php
namespace Smith\Core;

abstract class Controller {

    protected $app;

    public function __construct(App $app) {
        $this->app = $app;
    }

    public abstract function run();
}
?>