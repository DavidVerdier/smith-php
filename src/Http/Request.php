<?php
/**
 * Created by PhpStorm.
 * User: Etienne
 * Date: 20-Oct-17
 * Time: 3:06
 */

namespace Smith\Http;


class Request implements AbstractRequest {

    private $method;

    private $uri;

    private $headers;

    private $body;

    /**
     * Allows construction of a custom request for testing purposes.
     * If called with no arguments, it constructs the request from the real incoming HTTP data.<3
     * @param string|null $method   The HTTP method
     * @param string $uri           The request URI
     * @param array $headers        The request headers
     * @param string $body          The request body
     */
    public function __construct(string $method = null, string $uri = "", array $headers = array(), string $body = "") {
        if ($method === null) {
            $this->fromHeaders();
            return;
        }
        $this->method = strtoupper($method);
        $this->uri = $uri;
        $this->headers = $headers;
        $this->body = $body;
    }

    /**
     *
     */
    private function fromHeaders() {
        $this->method = $_SERVER['REQUEST_METHOD'];
        $this->uri = $_SERVER['REQUEST_URI'];
        $this->headers = getallheaders();
        $this->body = file_get_contents('php://input');
    }

    /**
     * @return string
     */
    public function getMethod() {
        return $this->method;
    }

    /**
     * @return string
     */
    public function getUri() {
        return $this->uri;
    }

    /**
     * @return array
     */
    public function getHeaders() {
        return $this->headers;
    }

    /**
     * @return string
     */
    public function getBody() {
        return $this->body;
    }

    /**
     * @return Object
     */
    public function parseBody() {
        return json_decode($this->body);
    }

}
