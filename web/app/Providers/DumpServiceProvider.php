<?php

namespace App\Providers;

use Dotenv\Dotenv;
use League\Container\ServiceProvider\AbstractServiceProvider;


class DumpServiceProvider extends AbstractServiceProvider
{

    protected $provides = [
        'dump'
    ];
    
    public function register()
    {
        $this->getContainer()->add('dump', function() {
            
        });

    }
}