<?php
/**
 * Author: Etienne "Eethe" Orlhac
 * Date: 22-Oct-17
 */

namespace Smith\Routing;


use Smith\Controller\Controller;
use Smith\DependencyInjection\AutoWirer;
use Smith\Http\Request;
use Smith\Http\Response;

class HttpRouter implements RouterInterface {

    private $routes;

    private $request;

    private $services;

    private $defaultRoute;

    /**
     * HttpRouter constructor.
     * @param Request $request
     * @param array $services
     */
    public function __construct(Request $request, array $services) {
        $this->routes = array();
        $this->request = $request;
        $this->services = $services;
        $this->defaultRoute = new Route(array(),"", function (Response $response) {
            $response->setStatus(404);
            $response->setBody("404 Not Found");
            $response->send();
        });
    }

    /**
     * @param string $pattern
     * @param \Closure|Controller $controller
     * @param string $action
     * @throws ActionNotImplementedException
     */
    public function match(array $prefixes, string $pattern, $controller, $action = "") {
        for ($i=0 ; $i<count($prefixes) ; $i++) {
            $prefixes[$i] = "<".$prefixes[$i].">";
        }
        $this->routes[] = new Route($prefixes, "<^".$pattern."$>", $controller, $action);
    }

    /**
     * @param $controller
     * @param string $action
     */
    public function default($controller, $action = "") {
        $this->defaultRoute = new Route(array(),"", $controller, $action);
    }

    /**
     * @param Route $route
     */
    public function handle(Route $route) {
        $controller = $route->getController();
        $aw = new AutoWirer();

        if ($controller instanceof \Closure) {
            $params = $aw->wireClosure($controller,
                array_merge($this->services, $route->getMatches()));

            $controller(...$params);
        }

        if ($controller instanceof Controller) {
            $action = $route->getAction();

            $params = $aw->wireMethod($controller, $action,
                array_merge($this->services, $route->getMatches()));

            $controller->$action(...$params);
        }
    }

    /**
     *
     */
    public function dispatch() {
        foreach ($this->routes as $route) {
            if ($route->match(array($this->request->getMethod()),
                                $this->request->getUri())) {

                $this->handle($route);
                return; //Exit on first found route.
            }
        }
        $this->handle($this->defaultRoute); //Or use default.
    }

    public function get(string $pattern, $controller, $action = "") {
        $this->match(array("^GET$"), $pattern, $controller, $action);
    }

    public function post(string $pattern, $controller, $action = "") {
        $this->match(array("^POST$"), $pattern, $controller, $action);
    }

    public function put(string $pattern, $controller, $action = "") {
        $this->match(array("^PUT$"), $pattern, $controller, $action);
    }

    public function patch(string $pattern, $controller, $action = "") {
        $this->match(array("^PATCH$"), $pattern, $controller, $action);
    }

    public function delete(string $pattern, $controller, $action = "") {
        $this->match(array("^DELETE$"), $pattern, $controller, $action);
    }

    public function any(string $pattern, $controller, $action = "") {
        $this->match(array("^GET$|^POST$|^PUT$|^PATCH$|^DELETE$"), $pattern, $controller, $action);
    }

}
