<?php
namespace core;

class Response
{
    private $headers;

    private $body = '';

    public function __construct() {
        $this->headers = new Headers();
    }

    public function append(string $content) {
        $this->body .= $content;
    }

    public function sendHeaders() {
        $this->headers->send();
    }

    public function send() {
        $this->sendHeaders();
        echo $this->body;
    }

    public function file(string $filename) {
        $this->headers->set('Content-type', finfo_file(finfo_open(FILEINFO_MIME_TYPE), $filename));
        //$this->headers->set('Content-Disposition','attachment; filename="'.$filename.'"');
        $this->headers->set('Content-length', filesize($filename));
        $this->body = file_get_contents($filename);
    }
}
?>