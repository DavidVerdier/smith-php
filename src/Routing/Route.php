<?php
/**
 * Created by PhpStorm.
 * User: Etienne
 * Date: 20-Oct-17
 * Time: 3:04
 */

namespace Smith\Routing;


use Smith\Controller\Controller;

class Route {

    private $prefixes;

    private $pattern;

    private $controller;

    private $action;

    private $matches;

    /**
     * Route constructor.
     * @param array $prefixes
     * @param string $pattern
     * @param $controller
     * @param string $action
     * @throws ActionNotImplementedException
     */
    public function __construct(array $prefixes, string $pattern, $controller, $action = "") {
        $this->prefixes = $prefixes;
        $this->pattern = $pattern;

        if ($controller instanceof \Closure) {
            $this->controller = $controller;
        } else if ($controller instanceof Controller) {

            if (!method_exists($controller, $action)) {
                throw new ActionNotImplementedException($action);
            }

            $this->controller = $controller;
            $this->action = $action;
        } else {
            throw new \InvalidArgumentException(
                "Controller must be an instance of \Closure or \Smith\Controller\Controller.");
        }
    }

    /**
     * @param array $prefixes
     * @param string $input
     * @return bool
     */
    public function match(array $prefixes, string $input) {

        if (count($this->prefixes) != count($prefixes)) {
            return false;
        }

        for ($i=0 ; $i < count($prefixes) ; $i++) {
            if (!(preg_match($this->prefixes[$i], $prefixes[$i]) === 1)) {
                return false;
            }
        }

        return preg_match($this->pattern, $input, $this->matches) === 1;
    }

    /**
     * @return mixed
     */
    public function getMatches() {
        if ($this->matches === null) {
            $this->matches = array();
        }
        return array_slice($this->matches,1,count($this->matches)-1);
    }

    /**
     * @return \Closure|Controller
     */
    public function getController() {
        return $this->controller;
    }

    /**
     * @return string
     */
    public function getAction() {
        return $this->action;
    }

}