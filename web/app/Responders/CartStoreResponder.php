<?php

namespace App\Responders;

use Psr\Http\Message\ResponseInterface;

class CartStoreResponder extends BaseResponder
{

	public function send(ResponseInterface $response, array $cart)
	{

		if(isset($cart['errors'])) {

			return $this->withJson($response, $cart['errors'], 400);

		} else {

			return $this->withJson($response, $cart, 200);

		}

	}

}