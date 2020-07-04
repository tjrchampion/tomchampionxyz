<?php

declare(strict_types=1);

namespace App\Action;

use App\Domain\Services\ContactStoreService;
use App\Responders\ContactStoreResponder;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

final class ContactStoreAction
{

	/**
	 * @var ContactStoreResponder
	 */
	private $responder;
	/**
	 * @var ContactStoreService
	 */
	private $service;

	/**
	 * CartAction constructor.
	 * @param ContactStoreService $service
	 * @param ContactStoreResponder $responder
	 */
	public function __construct(ContactStoreService $service, ContactStoreResponder $responder)
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