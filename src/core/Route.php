<?php
namespace Heptagon\Core;

class Route {

    public static function get(string $matcher, Controller $controller) {
        Router::match(array('GET'),$matcher,$controller);
    }

    public static function post(string $matcher, Controller $controller) {
        Router::match(array('POST'),$matcher,$controller);
    }

    public static function put(string $matcher, Controller $controller) {
        Router::match(array('PUT'),$matcher,$controller);
    }

    public static function delete(string $matcher, Controller $controller) {
        Router::match(array('DELETE'),$matcher,$controller);
    }

    public static function patch(string $matcher, Controller $controller) {
        Router::match(array('PATCH'),$matcher,$controller);
    }

    public static function options(string $matcher, Controller $controller) {
        Router::match(array('OPTIONS'),$matcher,$controller);
    }

    public static function head(string $matcher, Controller $controller) {
        Router::match(array('HEAD'),$matcher,$controller);
    }

    public static function any(string $matcher, Controller $controller) {
        Router::match(array('GET','POST','PUT','DELETE','PATCH','OPTIONS','HEAD'),$matcher,$controller);
    }

    public static function match(array $verbs, string $matcher, Controller $controller) {
        if (in_array($_SERVER['REQUEST_METHOD'], $verbs)) {
            if ($matcher == $_SERVER['REQUEST_URI']) {
                $controller->execute();
            }
        }
    }

    public static function setDefaultController(Controller $controller) {

    }

    public static function import(string $filename) {

    }
}
?>