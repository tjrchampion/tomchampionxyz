<?php
namespace App\Controllers\Http\Auth;

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

    public function index($request, $response)
    {
        return $this->view->render($response, 'login.twig');
    }

    public function update($request, $response)
    {
        return $response->withJson([
            'success' => true,
            'message' => 'CSRF post request successful'
        ], 200);
    }
    
}

