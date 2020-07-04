<?php

declare(strict_types=1);

namespace App\Domain\Repositories\Implementations;

use App\Domain\Models\Contact;
use App\Domain\Repositories\Contracts\ContactInterface;

class ContactRepositoryImpl implements ContactInterface
{

	public function send(array $body) : array
	{
		return Contact::create([
			'email' => $body['email'],
			'name' => $body['name'],
			'body' => $body['body']
		])->toArray();
	}

}