<?php
/**
 * Created by PhpStorm.
 * User: Etienne
 * Date: 20-Oct-17
 * Time: 4:09
 */

namespace Test;


use Smith\Console\CommandInterface;
use Smith\DependencyInjection\AutoWirer;
use Smith\Http\Response;

class TestCommand implements CommandInterface {
    public function getDoc() {
        // TODO: Implement getDoc() method.
    }

    public function getShortDoc() {
        return "DI tests";
    }

    public function getName() {
        return "di";
    }

    public function run(array $args) {

        $closure = function (Response $rq, string $c, \integer $b) {

        };

        $aw = new AutoWirer();
        var_dump($aw->wireClosure($closure,array(new Response(), 6, "hello")));
        var_dump($aw->wireMethod($this,"test",array(new Response(), 6, "hello", "bye", 1)));

    }


    public function test(string $a, Response $rq, string $c, \integer $b) {

    }
}
