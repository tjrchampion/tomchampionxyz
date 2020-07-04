<?php

declare(strict_types=1);

namespace App\Exceptions;

use Throwable;
use Slim\Views\Twig;
use Slim\Psr7\Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class Handler
{
    private $view;

    public function __construct(Twig $view)
    {
        $this->view = $view;
        $this->response = $response;
    }

    public function __invoke(Request $request, Throwable $exception) {

        $response = new Response();
        return $this->view->render($response, 'errors/404.twig', compact('message'))->withStatus(404);
    }
}