<?php

use Dotenv\Dotenv;
use Monolog\Logger;

use \Slim\Csrf\Guard;
use \Slim\Views\Twig;
use Slim\Psr7\Response;
use App\Exceptions\Handler;
use Slim\Factory\AppFactory;
use \Slim\Views\TwigExtension;
use League\Container\Container;
use League\Container\ReflectionContainer;
use Slim\Exception\HttpNotFoundException;


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


$app->addBodyParsingMiddleware();
$app->addRoutingMiddleware();
$error = $app->addErrorMiddleware(true, true, true);

$error->setDefaultErrorHandler(Handler::class);