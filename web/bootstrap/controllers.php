<?php

use App\Controllers\Http\HomeController;
use App\Controllers\Http\Auth\RegisterController;


$container->share(HomeController::class, function() use ($container) {
    return new HomeController(
        $container->get('view')
    );
});

$container->add(RegisterController::class, function() use ($container) {
    return new RegisterController(
        $container->get('view')
    );
});