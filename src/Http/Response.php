<?php
/**
 * Created by PhpStorm.
 * User: Etienne
 * Date: 20-Oct-17
 * Time: 3:06
 */

namespace Smith\Http;


class Response implements AbstractResponse {

    private $status = 200;

    private $httpVersion = '1.1';

    private $headers = array();

    private $body = "";

    private $headersSent = false;

    private $sent = false;

    public function setStatus(int $status, string $httpVersion = '1.1') {
        $this->status = $status;
        $this->httpVersion = $httpVersion;
    }

    public function setHeader(string $key, string $value) {
        $this->headers[$key] = $value;
    }

    public function setBody(string $content) {
        $this->body = $content;
    }

    public function append(string $content) {
        $this->body .= $content;
    }

    public function prepend(string $content) {
        $this->body = $content . $this->body;
    }

    public function send() {
        if ($this->sent) return;

        if (!$this->headersSent) {
            $this->sendHeaders();
        }

        echo $this->body;

        $this->sent = true;
    }

    public function sendHeaders() {
        if ($this->headersSent) return;

        header('HTTP/'.$this->httpVersion.' '.$this->status);

        foreach ($this->headers as $key => $value) {
            header($key . ': ' . $value);
        }

        $this->headersSent = true;
    }
}