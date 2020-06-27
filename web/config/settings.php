<?php

use Monolog\Logger;

error_reporting(0);
ini_set('display_errors', '0');

// Timezone
date_default_timezone_set('Europe/London');

$container->add('settings', function () {
    return [
        'displayErrorDetails' => getenv('APP_DEBUG') === 'true',
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