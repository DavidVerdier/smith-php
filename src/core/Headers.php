<?php
namespace Smith\Core;

class Headers {
    private $status = '200 OK';

    private $httpVersion = '1.1';

    private $headers = array();

    public function send() {
        foreach ($this->headers as $key => $value) {
            header($key . ': ' . $value);
        }
    }

    public function set(string $key, string $value) {
        $this->headers[$key] = $value;
    }

    public function setStatus(string $status, string $httpVersion = '1.1') {
        $this->status = $status;
        $this->httpVersion = $httpVersion;
    }
}
?>