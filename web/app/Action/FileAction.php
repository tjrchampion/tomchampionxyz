<?php

declare(strict_types=1);

namespace App\Action;

use App\Domain\Services\FileService;
use App\Responders\FileResponder;

use League\Container\Container;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

final class FileAction
{

	/**
	 * @var FileResponder
	 */
	private $responder;
	/**
	 * @var FileService
	 */
	private $service;

	/**
	 * CartAction constructor.
	 * @param CartService $service
	 * @param CartResponder $responder
	 */
	public function __construct(FileService $service, FileResponder $responder)
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
				$request->getAttribute('cart_id'),
				$request->getAttribute('filename'),
				$request->getQueryParams('s')
			)
		);
    }

}