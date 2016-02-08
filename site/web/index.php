<?php
//https://knpuniversity.com/

require_once __DIR__.'/../vendor/autoload.php';
//require_once __DIR__.'/../src/Controller/PostController.php';

$app = new Silex\Application();
$app['debug'] = true;
$app->register(new Silex\Provider\DoctrineServiceProvider(), array(
    'db.options' => array(
        'driver'   => 'pdo_mysql',
        'host'      => 'localhost',
        'dbname'    => 'silex',
        'user'      => 'root',
        'password'  => 'usbw',
        'port'      => '3307',
    ),
));

$app->get('/', function() use($app) {
    return 'Welcome!';
});
$app->get('/hello/{username}', function($username) use($app) {
    return 'Hello '.$app->escape($username);
});

$app->get('/blog', 'Controller\\PostController::indexAction');
$app->get('/blog/{id}', 'Controller\\PostController::showAction');

$app->run();

