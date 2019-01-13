<?php

namespace App\Controllers\Http\Auth;

use Slim\Views\Twig as View;
use Slim\Csrf\Guard;


class RegisterController {


    protected $view;
    
    protected $csrf;

    public function __construct(View $view, Guard $csrf)
    {
        $this->view = $view;
        $this->csrf = $csrf;
    }

    public function index($request, $response)
    {
        return $this->view->render($response, 'register.twig');
    }

    public function store($request, $response)
    {
        return $response->withJson([
            'success' => true,
            'message' => 'You\'ve securely registered.'
        ], 200);
    }


}