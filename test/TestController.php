<?php
namespace Test;
use Smith\Controllers\Controller;

class TestController extends Controller {
    public function test() {
        $this->redirect('/test2/');
    }

    public function test2() {
        echo 'Test working.';
    }
}
?>