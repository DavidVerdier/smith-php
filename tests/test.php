<?php
require_once __DIR__.'/../vendor/autoload.php';

$app = new \Smith\Console\ConsoleApplication();

$app->register(new \Test\TestCommand());

$app->run();
