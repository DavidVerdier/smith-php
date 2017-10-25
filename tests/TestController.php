<?php
/**
 * Author: Etienne "Eethe" Orlhac
 * Date: 25-Oct-17
 */

namespace Test;

use Smith\Framework\WebController;
use Smith\Http\Request;
use Smith\Template\Twig\TwigLoaderAdapter;

class TestController extends WebController {

    public function test(Request $rq, string $id) {
        echo $id;
    }

    public function a(Request $rq, TwigLoaderAdapter $loader) {

        $this->view($loader->load("base.html"), array("title" => "Hello"));
    }
}
