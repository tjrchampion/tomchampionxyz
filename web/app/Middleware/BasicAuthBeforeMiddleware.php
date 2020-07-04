<?php

namespace App\Middleware;

use Slim\Psr7\Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Domain\Repositories\Contracts\ConsumerInterface;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;

class BasicAuthBeforeMiddleware
{

    public function __construct(ConsumerInterface $consumer)
    {
        $this->consumer = $consumer;
    }
    /**
     * Example middleware invokable class
     *
     * @param  ServerRequest  $request PSR-7 request
     * @param  RequestHandler $handler PSR-15 request handler
     *
     * @return Response
     */
    public function __invoke(Request $request, RequestHandler $handler): Response
    {
        $header = explode(" ", $request->getHeader('authorization')[0]);
        $auth = base64_decode($header[1]);
        $auth = explode(":", $auth);

        $consumer = $this->consumer->get($auth[0]);

        $headers = array('WWW-Authenticate' => 'Basic');

        $response = new Response();

        //we have NO record
        if(is_null($consumer)){
            return $response->withStatus(401);
        }
        //we have a record and the password has NOT been verified.
        if(!is_null($consumer) && !password_verify($auth[1], $consumer->token)){
            return $response->withStatus(401);
        }
        //we have a record and the password has been verified.
        if(!is_null($consumer) && password_verify($auth[1], $consumer->token)){
            return $handler->handle($request);
        }
        
    
    }
}