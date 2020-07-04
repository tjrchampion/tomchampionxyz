<?php

namespace App\Providers;

use Monolog\Logger;
use Psr\Http\Message\ResponseFactoryInterface;
use League\Container\ServiceProvider\AbstractServiceProvider;

class ConfigServiceProvider extends AbstractServiceProvider
{
    protected $responseFactory;

    protected $provides = [
        'settings'
    ];
    
    public function register()
    {
        $container = $this->getContainer();

        $container->add('settings', function () {
           
            return [
                'displayErrorDetails' => getenv('APP_DEBUG'),
                'logger' => [
                    'level' => Logger::ERROR,
                ],
                'app' => [
                    'name' => getenv('APP_NAME')
                ],
                'views' => [
                    'cache' => getenv('VIEW_CACHE_DISABLED') === 'true' ? false : __DIR__ . '/../storage/views'
                ],
                'image' => [
                    'cache' => [
                        'path' => base_path('storage/cache/image')
                    ]
                ]
            ];

        });
    }
}