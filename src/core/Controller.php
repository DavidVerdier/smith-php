<?php
namespace Heptagon\Core;

abstract class Controller {

    protected $app;

    protected $request;

    protected $response;

    public function _init(App $app) {
        $this->app = $app;
        $this->request = $app->getRequest();
        $this->response = $app->getResponse();
    }

    public function execute() {
        $this->run();
    }

    public abstract function run();
}
?>