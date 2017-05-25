<?php
namespace Heptagon\Core;

class App
{
    private $request;

    private $response;

    public function __construct() {
        $this->request = Request::fromHeaders();
        $this->Response = new Response();
    }

    public function run(App $app) {
        
    }

    public function getRequest() {
        return $this->request;
    }

    public function getResponse() {
        return $this->response;
    }
}
?>