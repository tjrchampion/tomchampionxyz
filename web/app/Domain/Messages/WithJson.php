<?php

namespace App\Domain\Messages;

use Slim\Psr7\Message;
use Slim\Psr7\Response;

class WithJson extends Response
{

	protected $data;
	/**
	 * @var int
	 */
	protected $status;


	public function __invoke(int $status, $headers, $data = null)
	{
		return $this->getBody()->write(
			json_encode([
				'success' => ($status >= 400) ? false : true,
				'data' => ['123']
			])
		);

	}

}