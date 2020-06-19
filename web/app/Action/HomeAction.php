<?php

declare(strict_types=1);

namespace App\Action;

use Slim\Views\Twig;
use App\Action\Controller;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class HomeAction
{

    public function __invoke(Request $request, Response $response)
    {
        return $this->view->render($response, 'index.twig');
    }

}