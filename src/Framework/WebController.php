<?php
/**
 * Author: Etienne "Eethe" Orlhac
 * Date: 24-Oct-17
 */

namespace Smith\Framework;


use Smith\Controller\Controller;
use Smith\Http\Response;
use Smith\Template\Renderable;

class WebController extends Controller {

    /**
     * Redirects the client to the given location.
     * By default, redirect() sends a HTTP status header of 301 for SEO-safe redirection.
     * The $temporary flags signals that this should be a temporary redirection (HTTP status code 302).
     * @param string $location
     * @param bool $temporary
     */
    protected function redirect(string $location, bool $temporary = true) {
        $response = new Response();

        if ($temporary) {
            $response->setStatus(302);
        } else {
            $response->setStatus(301);
        }

        $response->setHeader('Location',$location);
        $response->sendHeaders();
    }

    /**
     * @param Renderable $view
     * @param array $params
     * @param Response|null $response
     */
    protected function view(Renderable $view, array $params, Response $response = null) {
        if ($response === null) {
            $response = new Response();
        }
        $response->setBody($view->render($params));
        $response->send();
    }
}
