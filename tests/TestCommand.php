<?php
/**
 * Created by PhpStorm.
 * User: Etienne
 * Date: 20-Oct-17
 * Time: 4:09
 */

namespace Test;


use Smith\Console\CommandInterface;

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

        var_dump(self::class);
    }
}
