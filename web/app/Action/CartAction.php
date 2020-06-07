<?php

namespace App\Action;

use App\Domain\Services\CartService;
use App\Responders\CartResponder;

use League\Container\Container;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

final class CartAction
{

	/**
	 * @var CartResponder
	 */
	private $responder;
	/**
	 * @var CartService
	 */
	private $service;

	/**
	 * CartAction constructor.
	 * @param CartService $service
	 * @param CartResponder $responder
	 */
	public function __construct(CartService $service, CartResponder $responder)
    {
        $this->service = $service;
        $this->responder = $responder;
    }

	/**
	 * @param RequestInterface $request
	 * @param ResponseInterface $response
	 * @return ResponseInterface
	 */
    public function __invoke(RequestInterface $request, ResponseInterface $response)
    {

    	return $this->responder->send($response,
		    $this->service->handle(
			    $request->getAttribute('udid')
		    )
	    );

    }

}