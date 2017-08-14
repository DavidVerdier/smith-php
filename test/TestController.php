<?php
namespace Test;
use Smith\Controller\Controller;

class TestController extends Controller {
    public function test() {
        $this->redirect('/test2/');
    }

    public function test2() {
        echo 'Test working.';
    }
    
    public function testView() {
    	$this->view(new TestView(array('title' => 'I am a smith')));
    }
}
?>