<?php

namespace App\Action;



use App\Domain\Services\CartStoreService;
use App\Responders\CartStoreResponder;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

final class CartStoreAction
{

	/**
	 * @var CartStoreResponder
	 */
	private $responder;
	/**
	 * @var CartStoreService
	 */
	private $service;

	/**
	 * CartAction constructor.
	 * @param CartStoreService $service
	 * @param CartStoreResponder $responder
	 */
	public function __construct(CartStoreService $service, CartStoreResponder $responder)
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