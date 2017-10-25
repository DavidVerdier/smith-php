<?php
/**
 * Author: Etienne "Eethe" Orlhac
 * Date: 24-Oct-17
 */

namespace Smith\Framework;


use Smith\Application\ApplicationInterface;
use Smith\Framework\Configuration\Config;
use Smith\Http\Request;
use Smith\Http\Response;
use Smith\Routing\HttpRouter;

class WebApplication implements ApplicationInterface {

    const DEFAULT_CONFIG_FILE = "../config/config.json";

    private $request;

    private $response;

    private $router;

    private $config;

    private $services;

    /**
     * WebApplication constructor.
     * @param string|null $configFile
     */
    public function __construct(string $configFile = null) {
        if ($configFile === null) {
            $configFile = self::DEFAULT_CONFIG_FILE;
        }
        $this->config = new Config($configFile);
        $this->services = array();

        $this->request = new Request();
        $this->response = new Response();

        $this->services[] = $this->request;
        $this->services[] = $this->response;
        $this->setupTemplateLoader();

        $this->router = new HttpRouter($this->request, $this->services);

        $this->importRoutes();
    }

    public function run() {
        $this->router->dispatch();
    }

    /**
     * @return HttpRouter
     */
    public function getRouter(): HttpRouter {
        return $this->router;
    }

    private function importRoutes() {
        if ($this->config->has('routes')) {
            foreach ($this->config->routes as $route) {
                if (isset($route->method)) {
                    $this->router->match($route->method,$route->pattern,new $route->controller,$route->action);
                } else {
                    $this->router->any($route->pattern,new $route->controller,$route->action);
                }
            }
        }
    }

    private function setupTemplateLoader() {
        if ($this->config->has('template')) {
            $this->services[] = new $this->config->template->loader($this->config->template->path);
        }
    }
}
