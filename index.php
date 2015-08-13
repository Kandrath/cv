<?php

define('SCRIPT', basename(__FILE__));
require __DIR__ . '/required/init.inc.php';

use \Slim\Slim;

$app = new Slim();
$app->get('/hello/:name', function ($name) {
    echo "Hello, $name";
});
$app->get('/foo', function() {
	echo 'Foo !';
});
$app->run();