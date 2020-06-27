<?php

namespace App\Providers;

use App\Responders\BaseResponder;
use App\Responders\CartResponder;
use Intervention\Image\ImageManager;
use App\Domain\Repositories\Contracts\CartInterface;
use App\Domain\Repositories\Contracts\FileInterface;
use League\Container\ServiceProvider\AbstractServiceProvider;

class InterventionImageServiceProvider extends AbstractServiceProvider
{
    protected $provides = [
        'image',
        BaseResponder::class
    ];


    public function register()
    {
        $container = $this->getContainer();
        $opt = $container->get('settings')['image'];
        $container->add('image', function() use ($opt) {
            $manager = new ImageManager();
            $manager->configure($opt);
            return $manager;
        });

        $container->add(BaseResponder::class, function ()  use ($container)  {
            return new BaseResponder($container->get('image'));
        });


    }
}