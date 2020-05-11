<?php

namespace App\Providers;

use Slim\Psr7\Uri;
use Slim\Csrf\Guard;
use Slim\Views\Twig;
use Twig\Environment;
use App\Views\CsrfExtension;
use Slim\Views\TwigExtension;
use Slim\Psr7\Factory\UriFactory;
use Slim\Views\TwigRuntimeLoader;
use Slim\Interfaces\RouteParserInterface;
use League\Container\ServiceProvider\AbstractServiceProvider;

class ViewServiceProvider extends AbstractServiceProvider
{
    protected $provides = [
        'view'
    ];

    protected $routeParser;
    
    public function __construct(RouteParserInterface $routeParser)
    {
        $this->routeParser = $routeParser;
    }

    public function register()
    {
        $container = $this->getContainer();

        $container->add('view', function() use ($container) {

            $view = Twig::create(__DIR__ . '/../../resources/views', [
                'cache' => false
            ]);

            $view->addRuntimeLoader(
                new TwigRuntimeLoader(
                    $this->routeParser,
                    (new UriFactory)->createFromGlobals($_SERVER)
                )
            );

            $view->addExtension(
                new TwigExtension()
            );
            $view->addExtension( 
                new CsrfExtension( 
                    $container->get('csrf') 
                ) 
            );

            return $view;

        });



    }
}