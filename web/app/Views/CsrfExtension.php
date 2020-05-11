<?php

namespace App\Views;

use Slim\Csrf\Guard;
use Slim\Psr7\Request;
use Twig\TwigFunction;
use Twig\Extension\AbstractExtension;

class CsrfExtension extends AbstractExtension
{

    protected $guard;

    public function __construct(Guard $guard)
    {
        $this->guard = $guard;
    }

    public function getName()
    {
        return 'guard';
    }

    public function getFunctions()
    {
        return [
            new TwigFunction('csrf_field', array($this, 'csrfField')),
            new TwigFunction('csrf_meta', array($this, 'csrfMeta')),
        ];
    }

    public function csrfField()
    {
        return "
            <input type='hidden' name='{$this->guard->getTokenNameKey()}' value='{$this->guard->getTokenName()}'>
            <input type='hidden' name='{$this->guard->getTokenValueKey()}' value='{$this->guard->getTokenValue()}'>
        ";
    }

    public function csrfMeta()
    {
        return "
            <meta name='{$this->guard->getTokenNameKey()}' content='{$this->guard->getTokenName()}'>
            <meta name='{$this->guard->getTokenValueKey()}' content='{$this->guard->getTokenValue()}'>
        ";   
    }

    public function getGlobals()
    {
        return $this->guard->generateToken();
    }

}
