<?php
/**
 * Author: Etienne "Eethe" Orlhac
 * Date: 25-Oct-17
 */

namespace Test;

use Smith\Framework\WebController;
use Smith\Http\Request;
use Smith\Template\TemplateLoaderInterface;

class TestController extends WebController {

    public function test(Request $rq, string $id) {
        echo $id;
    }

    public function a(Request $rq, TemplateLoaderInterface $loader) {

        $this->view($loader->load("base.html"), array("title" => "Hello"));
    }
}
