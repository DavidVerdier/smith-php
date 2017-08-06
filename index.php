<?php
include_once('vendor/autoload.php');

use Smith\Http\Route;

$app = new Smith\App();

Route::any('/test/','Test\TestController@test');
Route::any('/test2/','Test\TestController@test2');

$app->run($app);
?>