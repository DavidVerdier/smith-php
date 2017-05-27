<?php
namespace Heptagon\Core;

class App
{
    private $request;

    private $response;

    public function __construct() {
        $this->request = Request::fromHeaders();
        $this->response = new Response();
        Route::setDefaultController(new HTTP404Controller());
    }

    public function run(App $app) {
        
        Route::executeController($this);

    }

    public function getRequest() {
        return $this->request;
    }

    public function getResponse() {
        return $this->response;
    }
}
?>