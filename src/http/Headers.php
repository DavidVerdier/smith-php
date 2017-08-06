<?php
namespace Smith\Http;

class Headers {
    private $status = '200 OK';

    private $httpVersion = '1.1';

    private $headers = array();

    private $sent = false;

    public function send() {
        if ($this->sent) return;

        header('HTTP'.$this->httpVersion.' '.$this->status);

        foreach ($this->headers as $key => $value) {
            header($key . ': ' . $value);
        }

        $this->sent = true;
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