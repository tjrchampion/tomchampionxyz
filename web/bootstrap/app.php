<?php

use \Slim\Csrf\Guard;
use \Slim\Views\Twig;

use Slim\Factory\AppFactory;
use \Slim\Views\TwigExtension;
use League\Container\Container;
use League\Container\ReflectionContainer;
use Dotenv\Dotenv;
use Monolog\Logger;


session_start();

require __DIR__ . '/../vendor/autoload.php';


try {
    $dotenv = Dotenv::createImmutable(__DIR__ . "/../");
    $dotenv->load();
} catch (Dotenv\Exception\InvalidPathException $e) {
    //
}

$container = new Container();

$container->delegate(
    new ReflectionContainer
);

AppFactory::setContainer($container);
$app = AppFactory::create();


// /** middleware **/
// $app->add('csrf');

$app->addBodyParsingMiddleware();
$app->addRoutingMiddleware();
$app->addErrorMiddleware(true, true, true);


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