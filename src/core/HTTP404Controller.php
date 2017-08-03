<?php
namespace Smith\Core;

class HTTP404Controller extends Controller {

    public function run() {
        header('HTTP/1.1 404 Not Found');
        echo 'HTTP Error 404 : Resource not found.';
    }
}
?>
