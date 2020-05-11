<?php

namespace App\Providers;

use Dotenv\Dotenv;
use League\Container\ServiceProvider\AbstractServiceProvider;


class DotenvServiceProvider extends AbstractServiceProvider
{

    protected $provides = [
        'dotenv'
    ];
    
    public function register()
    {
        $this->getContainer()->add('dotenv', function() {
            if(file_exists(__DIR__ . '/../../.env')) {
                $dotenv = Dotenv::createImmutable(__DIR__.'/../..');
                $dotenv->load();
            }
        });

    }
}