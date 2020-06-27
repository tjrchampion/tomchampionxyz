<?php

namespace App\Responders;

use Psr\Http\Message\ResponseInterface;

class FileResponder extends BaseResponder
{

	public function send(ResponseInterface $response, array $file)
	{

		if(!$file) {
			return $this->withJson($response, $file, 404);
		}


		if(array_key_exists(0, $file)) {
			return $this->withJson($response, $file, 200);
		}

		return $this->withImage($response, $file, 200);


	}

}