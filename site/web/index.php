<?php
//https://knpuniversity.com/

require_once __DIR__.'/../vendor/autoload.php';
//require_once __DIR__.'/../src/Controller/PostController.php';
require_once __DIR__.'/../parameters.php';

$app = new Silex\Application();
$app['debug'] = true;


$app->register(new Silex\Provider\DoctrineServiceProvider(), array(
    'db.options' => $parameters['db'],
));
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => $parameters['twig']['path'],
));
$app->register(new Silex\Provider\UrlGeneratorServiceProvider());



$app->get('/', function() use($app) {
    return 'Welcome!';
});
$app->get('/hello/{username}', function($username) use($app) {
    return 'Hello '.$app->escape($username);
});

$app->get('/blog', 'Controller\\PostController::indexAction')
->bind('post_index');
$app->get('/blog/{id}', 'Controller\\PostController::showAction')
    ->assert('id','[0-9]+')
    ->bind('post_show');
//    ->method('GET');

$app->run();

