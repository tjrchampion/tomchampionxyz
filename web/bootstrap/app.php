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

$app->addBodyParsingMiddleware();
$app->addRoutingMiddleware();
$app->addErrorMiddleware(true, true, true);