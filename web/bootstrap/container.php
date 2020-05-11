<?php

use App\Providers\CsrfServiceProvider;
use App\Providers\DumpServiceProvider;
use App\Providers\ViewServiceProvider;
use App\Providers\DotenvServiceProvider;


$container->addServiceProvider(
    new DotenvServiceProvider()
);
$container->get('dotenv');

$container->addServiceProvider(
    new CsrfServiceProvider(
        $app->getResponseFactory()
    )
);

$container->addServiceProvider(
    new ViewServiceProvider(
        $app->getRouteCollector()->getRouteParser()
    )
);

$container->addServiceProvider(
    new DumpServiceProvider()
);