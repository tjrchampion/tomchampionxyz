<?php

namespace App\Providers;

use App\Domain\Repositories\Contracts\CartInterface;
use App\Domain\Repositories\Contracts\FileInterface;
use App\Domain\Repositories\Contracts\ContactInterface;
use App\Domain\Repositories\Contracts\ConsumerInterface;
use League\Container\ServiceProvider\AbstractServiceProvider;
use App\Domain\Repositories\Implementations\CartRepositoryImpl;
use App\Domain\Repositories\Implementations\FileRepositoryImpl;
use App\Domain\Repositories\Implementations\ContactRepositoryImpl;
use App\Domain\Repositories\Implementations\ConsumerRepositoryImpl;

class RepositoryServiceProvider extends AbstractServiceProvider
{
    protected $provides = [
        CartInterface::class,
        FileInterface::class,
	    ContactInterface::class,
	    ConsumerInterface::class,
    ];


    public function register()
    {
        $container = $this->getContainer();

        $container->add(FileInterface::class, function ()  use ($container)  {
            return new FileRepositoryImpl($container->get('image'));
        });

        $container->add(ContactInterface::class, function () {
		    return new ContactRepositoryImpl();
	    });

	    $container->add(CartInterface::class, function () {
            return new CartRepositoryImpl();
        });

        $container->add(ConsumerInterface::class, function () {
            return new ConsumerRepositoryImpl();
        });

    }
}