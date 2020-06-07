<?php

namespace App\Action;



use App\Domain\Services\CartDeleteService;
use App\Responders\CartDeleteResponder;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

final class CartDeleteAction
{

	/**
	 * @var CartDeleteResponder
	 */
	private $responder;
	/**
	 * @var CartDeleteService
	 */
	private $service;

	/**
	 * CartAction constructor.
	 * @param CartDeleteService $service
	 * @param CartDeleteResponder $responder
	 */
	public function __construct(CartDeleteService $service, CartDeleteResponder $responder)
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
				$request->getParsedBody()
			)
		);

	}

}