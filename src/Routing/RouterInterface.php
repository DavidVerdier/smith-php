<?php
/**
 * Created by PhpStorm.
 * User: Etienne
 * Date: 20-Oct-17
 * Time: 3:04
 */

namespace Smith\Routing;


interface RouterInterface {

    public function match(array $prefixes, string $pattern, $controller, $action = "");

    public function default($controller, $action = "");

    public function handle(Route $route);

    public function dispatch();
}
