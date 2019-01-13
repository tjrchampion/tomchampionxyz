<?php

session_start();

require '../vendor/autoload.php';

use App\Views\CsrfExtension;
use \Slim\Csrf\Guard;
use \Slim\Views\ {
    Twig,
    TwigExtension
};

$app = new Slim\App([
    'settings' => [
        'displayErrorDetails' => true
    ] 
]);


$container = $app->getContainer();

$container['view'] = function($container) {

    $view = new Twig(__DIR__ . '/../resources/views', [
        'cache' => false
    ]);

    $view->addExtension(new TwigExtension(
        $container->router,
        $container->request->getUri()
    ));

    $view->addExtension( new CsrfExtension( $container['csrf'] ) );

    return $view;

};

/** 
 * App\Controllers\Http;
 * 
 */
$container['AuthController'] = function($c) {
    return new App\Controllers\Http\Auth\AuthController($c->view, $c->csrf);
};
$container['RegisterController'] = function($c) {
    return new App\Controllers\Http\Auth\RegisterController($c->view, $c->csrf);
};

/**
 *  Inject Slim\Csrf\Guard
 */
$container['csrf'] = function($container) {
    $guard =  new \Slim\Csrf\Guard;
    $guard->setPersistentTokenMode(true);
    return $guard;
};

//adding middleware
$app->add($container['csrf']);