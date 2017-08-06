<?php
namespace Smith\Http;

class Response
{
    public $headers;

    private $body = '';

    private $sent = false;

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
        if ($this->sent) return;

        $this->sendHeaders();
        echo $this->body;
        $this->sent = true;
    }

    public function file(string $filename) {
        if (file_exists($filename) === true) {
            $this->body = file_get_contents($filename);
            $this->headers->set('Content-type', finfo_file(finfo_open(FILEINFO_MIME_TYPE), $filename));
            $this->headers->set('Content-length', filesize($filename));
        } else {
            $this->headers->setStatus('404 Not Found','1.1');
        }
    }

    public function fileDownload(string $filename) {
        if (file_exists($filename) === true) {
            $this->body = file_get_contents($filename);
            $this->headers->set('Content-type', finfo_file(finfo_open(FILEINFO_MIME_TYPE), $filename));
            $this->headers->set('Content-Disposition','attachment; filename="'.$filename.'"');
            $this->headers->set('Content-length', filesize($filename));
        } else {
            $this->headers->setStatus('404 Not Found','1.1');
        }
    }
}
?>