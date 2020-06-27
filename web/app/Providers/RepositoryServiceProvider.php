<?php

namespace App\Providers;

use App\Responders\CartResponder;
use App\Domain\Repositories\Contracts\CartInterface;
use App\Domain\Repositories\Contracts\FileInterface;
use League\Container\ServiceProvider\AbstractServiceProvider;
use App\Domain\Repositories\Implementations\CartRepositoryImpl;
use App\Domain\Repositories\Implementations\FileRepositoryImpl;

class RepositoryServiceProvider extends AbstractServiceProvider
{
    protected $provides = [
        CartInterface::class,
        FileInterface::class
    ];


    public function register()
    {
        $container = $this->getContainer();

        $container->add(FileInterface::class, function ()  use ($container)  {
            return new FileRepositoryImpl($container->get('image'));
        });

        return $container->add(CartInterface::class, function () {
            return new CartRepositoryImpl();
        });

    }
}