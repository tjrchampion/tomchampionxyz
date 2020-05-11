<?php

use Slim\Factory\AppFactory;
use League\Container\Container;

use \Slim\Csrf\Guard;
use \Slim\Views\ {
    Twig,
    TwigExtension
};

session_start();

require '../vendor/autoload.php';

$container = new Container();

AppFactory::setContainer($container);
$app = AppFactory::create();

/** middleware **/
$app->add('csrf');


// $container->add('AuthController', function() use ($container) {
//     die($container->view);
//     return new App\Controllers\Http\Auth\AuthController($container->view, $container->csrf);
// });

// $container->add('RegisterController', function() use ($container) {
//     return new App\Controllers\Http\Auth\RegisterController($container->view, $container->csrf);
// });




// //adding middleware
// $app->add($container['csrf']);


// $app = new Slim\App([
//     'settings' => [
//         'displayErrorDetails' => true
//     ] 
// ]);


// $container = $app->getContainer();

// $container['view'] = function($container) {

//     $view = new Twig(__DIR__ . '/../resources/views', [
//         'cache' => false
//     ]);


//     $view->addExtension(new TwigExtension(
//         $container->router,
//         $container->request->getUri()
//     ));

//     $view->addExtension( new CsrfExtension( $container['csrf'] ) );

//     return $view;

// };

// /** 
//  * App\Controllers\Http;
//  * 
//  */
// $container['AuthController'] = function($c) {
//     return new App\Controllers\Http\Auth\AuthController($c->view, $c->csrf);
// };
// $container['RegisterController'] = function($c) {
//     return new App\Controllers\Http\Auth\RegisterController($c->view, $c->csrf);
// };

// /**
//  *  Inject Slim\Csrf\Guard
//  */
// $container['csrf'] = function($container) {
//     $guard =  new \Slim\Csrf\Guard;
//     $guard->setPersistentTokenMode(true);
//     return $guard;
// };

// //adding middleware
// $app->add($container['csrf']);