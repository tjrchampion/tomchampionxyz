<?php

namespace App\Views;

use Slim\Csrf\Guard;

class CsrfExtension extends \Twig_Extension
{

    protected $guard;

    public function __construct(Guard $guard)
    {
        $this->guard = $guard;
    }

    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction('csrf_field', array($this, 'csrfField')),
            new \Twig_SimpleFunction('csrf_meta', array($this, 'csrfMeta')),
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

}
