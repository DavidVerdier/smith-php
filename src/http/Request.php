<?php
namespace Smith\Http;

class Request {

    public $redirectStatus = '';
    public $host = '';
    public $connection = '';
    public $userAgent = '';
    public $httpAccept = '';
    public $httpDnt = '';
    public $encoding = '';
    public $language = '';
    public $address = '';
    public $scheme = '';
    public $port = '';
    public $url = '';
    public $gatewayInterface = '';
    public $protocol = '';
    public $method = '';
    public $queryString = '';
    public $uri = '';
    public $timeFloat = '';
    public $time = '';

    private $body = '';
    
    public static function fromHeaders() {
        $request = new Request();

        $request->redirectStatus = $_SERVER['REDIRECT_STATUS'];
        $request->host = $_SERVER['HTTP_HOST'];
        $request->connection = $_SERVER['HTTP_CONNECTION'];
        $request->userAgent = $_SERVER['HTTP_USER_AGENT'];
        $request->httpAccept = $_SERVER['HTTP_ACCEPT'];
        $request->httpDnt = $_SERVER['HTTP_DNT'];
        $request->encoding = $_SERVER['HTTP_ACCEPT_ENCODING'];
        $request->language = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
        $request->address = $_SERVER['REMOTE_ADDR'];
        $request->scheme = $_SERVER['REQUEST_SCHEME'];
        $request->port = $_SERVER['REMOTE_PORT'];
        $request->url = $_SERVER['REDIRECT_URL'];
        $request->gatewayInterface = $_SERVER['GATEWAY_INTERFACE'];
        $request->protocol = $_SERVER['SERVER_PROTOCOL'];
        $request->method = $_SERVER['REQUEST_METHOD'];
        $request->queryString = $_SERVER['QUERY_STRING'];
        $request->uri = $_SERVER['REQUEST_URI'];
        $request->timeFloat = $_SERVER['REQUEST_TIME_FLOAT'];
        $request->time = $_SERVER['REQUEST_TIME'];

        $request->body = $_POST;

        return $request;
    }

    public function getBody() {
        return $this->body;
    }

    public function getBodyAsObj() {
        return $this->body;
    }
}
?>