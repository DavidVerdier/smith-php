<?php
namespace Smith\Core;

class Headers {
    private $headers = array();

    public function send() {
        foreach ($this->headers as $key => $value) {
            header($key . ': ' . $value);
        }
    }

    public function set(string $key, string $value) {
        $this->headers[$key] = $value;
    }
}
?>