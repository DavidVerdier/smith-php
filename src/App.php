<?php
namespace Smith;
use Smith\Http\Route;
use Smith\Http\Request;

class App {
    private $request;

    public function __construct() {
        $this->request = Request::fromHeaders();
        Route::passRequest($this->request);
    }

    public function run(App $app) {
        Route::resolve();
        
        $controllerName = Route::getController();
        $action = Route::getAction();
        $params = Route::getParams();

        $controller = new $controllerName;
        $controller->_init($this->request);

        $controller->$action(...$params);
        
        $controller->getResponse()->send();
    }
}
?>