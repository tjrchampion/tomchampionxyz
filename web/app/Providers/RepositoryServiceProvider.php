<?php

namespace App\Providers;

use App\Domain\Repositories\Contracts\CartInterface;
use App\Domain\Repositories\Implementations\CartRepositoryImpl;
use App\Responders\CartResponder;
use League\Container\ServiceProvider\AbstractServiceProvider;

class RepositoryServiceProvider extends AbstractServiceProvider
{
    protected $provides = [
        CartInterface::class
    ];


    public function register()
    {
        $container = $this->getContainer();

        return $container->add(CartInterface::class, function () {
            return new CartRepositoryImpl();
        });

    }
}