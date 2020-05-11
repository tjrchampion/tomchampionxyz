<?php

namespace App\Providers;

use Slim\App;
use Slim\Csrf\Guard;
use App\Views\CsrfExtension;
use Psr\Http\Message\ResponseFactoryInterface;
use League\Container\ServiceProvider\AbstractServiceProvider;

class CsrfServiceProvider extends AbstractServiceProvider
{
    protected $responseFactory;

    protected $provides = [
        'csrf'
    ];
    
    public function __construct(ResponseFactoryInterface $responseFactory)
    {
        $this->responseFactory = $responseFactory;
    }

    public function register()
    {
        $container = $this->getContainer();

        $container->share('csrf', function () {
            return new Guard($this->responseFactory);
        });
    }
}