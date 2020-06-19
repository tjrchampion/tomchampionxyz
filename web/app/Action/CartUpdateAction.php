<?php

declare(strict_types=1);

namespace App\Action;

use App\Domain\Services\CartUpdateService;
use App\Responders\CartUpdateResponder;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

final class CartUpdateAction
{

	/**
	 * @var CartUpdateResponder
	 */
	private $responder;
	/**
	 * @var CartUpdateService
	 */
	private $service;

	/**
	 * CartAction constructor.
	 * @param CartUpdateService $service
	 * @param CartUpdateResponder $responder
	 */
	public function __construct(CartUpdateService $service, CartUpdateResponder $responder)
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