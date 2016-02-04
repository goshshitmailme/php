<?php
//https://knpuniversity.com/

require_once __DIR__.'/../vendor/autoload.php';

$app = new Silex\Application();

$app->get('/', function() use($app) {
    return 'Welcome!';
});
$app->get('/hello/{username}', function($username) use($app) {
    return 'Hello '.$app->escape($username);
});

$app->run();

