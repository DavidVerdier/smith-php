<?php
namespace Smith\Controllers;

use Smith\Http\Response;
use Smith\Http\Request;
use Smith\Template\Component;

abstract class Controller {

    private static $current;

    protected $request;

    protected $response;

    private $ready = false;

    public function _init(Request $request) {
        if ($this->ready) return;
        $this->request = $request;
        $this->response = new Response;
        self::$current = $this;
    }

    protected static function redirect(string $location) {
        self::$current->response->headers->setStatus('301 Moved Permanently');
        self::$current->response->headers->set('Location',$location);
        self::$current->response->headers->send();
    }

    protected static function view(Component $component) {

    }

    public function getResponse() {
        return $this->response;
    }
}
?>