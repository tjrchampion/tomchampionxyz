<?php

declare(strict_types=1);

namespace App\Domain\Repositories\Implementations;

use App\Domain\Models\Consumer;
use App\Domain\Repositories\Contracts\ConsumerInterface;

class ConsumerRepositoryImpl implements ConsumerInterface
{

	public function get($id)
	{
		return Consumer::where('id', $id)->first();
	}

}