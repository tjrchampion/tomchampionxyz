<?php

use App\Action\Controller;
use App\Action\HomeAction;
use App\Action\Auth\RegisterController;

$container->add(HomeAction::class, function() use ($container) {
    return new HomeAction(
        $container->get('view')
    );
});