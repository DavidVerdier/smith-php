<?php
namespace Smith\Core;

class Route {

    private static $defaultController;

    private static $controller;

    public static function get(string $pattern, Controller $controller) {
        Route::match(array('GET'),$pattern,$controller);
    }

    public static function post(string $pattern, Controller $controller) {
        Route::match(array('POST'),$pattern,$controller);
    }

    public static function put(string $pattern, Controller $controller) {
        Route::match(array('PUT'),$pattern,$controller);
    }

    public static function delete(string $pattern, Controller $controller) {
        Route::match(array('DELETE'),$pattern,$controller);
    }

    public static function patch(string $pattern, Controller $controller) {
        Route::match(array('PATCH'),$pattern,$controller);
    }

    public static function options(string $pattern, Controller $controller) {
        Route::match(array('OPTIONS'),$pattern,$controller);
    }

    public static function head(string $pattern, Controller $controller) {
        Route::match(array('HEAD'),$pattern,$controller);
    }

    public static function any(string $pattern, Controller $controller) {
        Route::match(array('GET','POST','PUT','DELETE','PATCH','OPTIONS','HEAD'),$pattern,$controller);
    }

    public static function match(array $verbs, string $pattern, Controller $controller) {
        $matched = false;

        if (in_array($_SERVER['REQUEST_METHOD'], $verbs)) {

            if ($pattern == $_SERVER['REQUEST_URI']) {

                self::$controller = $controller;
                $matched = true;
            }
        }
        return $matched;
    }

    public static function setDefaultController(Controller $controller) {
        self::$defaultController = $controller;
    }

    public static function import(string $filename) {
        if (self::$controller === null & file_exists($filename)) {

            $config = json_decode(file_get_contents($filename));

            foreach ($config->routes as $route) {
                if (Route::match($route->method,$route->pattern,new $route->controller)) {
                    return;
                }
            }
        }
    }

    public static function executeController(App $app = null) {
        if (self::$controller !== null) {
            self::$controller->_init($app);
            self::$controller->execute();
        } else {
            self::$defaultController->_init($app);
            self::$defaultController->execute();
        }
    }
}
?>