<?php

namespace App\Domain\Repositories\Contracts;

interface ContactInterface
{

	public function send(array $body) : array;

}