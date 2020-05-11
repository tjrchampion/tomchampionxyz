<?php

use App\Controllers\Http\HomeController;

/**
 * Define out your routes paths and your Controllers
 */

 
// $app->get('/', function (Request $request, Response $response) use ($container) {
//     return $container->get('view')->render($response, 'index.twig');
// });

$app->get('/', HomeController::class . ':index');

// $app->get('/', 'AuthController:index')->setName('index');
// $app->post('/', 'AuthController:update')->setName('update');

// $app->get('/register', 'RegisterController:index')->setName('register');
// $app->post('/register', 'RegisterController:store')->setName('store');