<?php
/**
 * Created by PhpStorm.
 * User: Etienne
 * Date: 20-Oct-17
 * Time: 4:09
 */

namespace Test;


use Smith\Console\CommandInterface;
use Smith\Controller\Controller;
use Smith\DependencyInjection\AutoWirer;

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

        $aw = new AutoWirer();

        $c = function (int $a, \integer $i, string $b, Controller $o, \Closure $c) {};

        $a = 1;

        var_dump(gettype($a));

        var_dump($aw->wireClosure($c,array(12,2,3,"a","b","c",function(){}, new TestController())));
    }
}
