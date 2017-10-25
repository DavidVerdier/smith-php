<?php
/**
 * Created by PhpStorm.
 * User: Etienne
 * Date: 20-Oct-17
 * Time: 3:16
 */

namespace Smith\Console;


interface CommandInterface {

    public function getName();

    public function getShortDoc();

    public function getDoc();

    public function run(array $args);
}
