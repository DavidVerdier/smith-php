<?php
namespace Smith\Http;

use Smith\Controllers\Controller;

class Route {

    private static $request;

    private static $handler;

    private static $controller = 'Smith\Controller\HTTP404Controller';

    private static $action = 'error';

    private static $params = array();

    public static function get(string $pattern, string $handler) {
        Route::match(array('GET'),$pattern,$handler);
    }

    public static function post(string $pattern, string $handler) {
        Route::match(array('POST'),$pattern,$handler);
    }

    public static function put(string $pattern, string $handler) {
        Route::match(array('PUT'),$pattern,$handler);
    }

    public static function delete(string $pattern, string $handler) {
        Route::match(array('DELETE'),$pattern,$handler);
    }

    public static function patch(string $pattern, string $handler) {
        Route::match(array('PATCH'),$pattern,$handler);
    }

    public static function options(string $pattern, string $handler) {
        Route::match(array('OPTIONS'),$pattern,$handler);
    }

    public static function head(string $pattern, string $handler) {
        Route::match(array('HEAD'),$pattern,$handler);
    }

    public static function any(string $pattern, string $handler) {
        Route::match(array('GET','POST','PUT','DELETE','PATCH','OPTIONS','HEAD'),$pattern,$handler);
    }

    public static function match(array $verbs, string $pattern, string $handler) {
        $matched = false;

        if (in_array(self::$request->method, $verbs)) {

            if ($pattern == self::$request->url) {

                self::$handler = $handler;
                self::parseHandler($handler);
                $matched = true;
            }
        }
        return $matched;
    }

    public static function default(string $handler) {
        self::parseHandler($handler);
    }

    private static function parseHandler(string $handler) {
        $parts = explode('@',self::$handler);
        self::$controller = $parts[0];
        self::$action = $parts[1];
    }

    public static function import(string $filename) {
        if (self::$handler === null & file_exists($filename)) {

            $config = json_decode(file_get_contents($filename));

            foreach ($config->routes as $route) {
                if (Route::match($route->method,$route->pattern,new $route->controller)) {
                    return;
                }
            }
        }
    }

    public static function passRequest(Request $request) {
        self::$request = $request;
    }

    public static function resolve() {

    }

    public static function getController() {
        if (self::$controller !== null) {
            return self::$controller;
        }
    }

    public static function getAction() {
        return self::$action;
    }

    public static function getParams() {
        return self::$params;
    }
}
?>
