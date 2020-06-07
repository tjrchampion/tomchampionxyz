<?php

namespace App\Responders;

use App\Domain\Messages\WithJson;
use Psr\Http\Message\ResponseInterface;

class CartResponder extends BaseResponder
{

	public function send(ResponseInterface $response, array $cart)
	{

		if(!$cart) {
			return $this->withJson($response, $cart, 400);
		}

		return $this->withJson($response, $cart, 200);

	}

}