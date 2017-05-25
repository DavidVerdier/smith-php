<?php
include_once('vendor/autoload.php');

use Heptagon\core\Route as Route;

Route::get('/', new controller\TestController);

$app = new core\App();
$app->run($app);

/*
$response = new core\Response();
$response->file('wao.jpg');
$response->send();
*/
?>