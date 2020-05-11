<?php

namespace App\Controllers\Http\Auth;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

use Slim\Views\Twig as View;
use Slim\Csrf\Guard;

class AuthController {

    protected $view;
    
    protected $csrf;

    public function __construct(View $view, Guard $csrf)
    {
        $this->view = $view;
        $this->csrf = $csrf;
    }

    public function index(Request $request, Response $response)
    {
        return $this->view->render($response, 'index.twig');
    }

    public function update($request, $response)
    {
        return $response->withJson([
            'success' => true,
            'message' => 'CSRF post request successful'
        ], 200);
    }
    
}

