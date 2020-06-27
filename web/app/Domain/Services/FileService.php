<?php

namespace App\Domain\Services;

use App\Domain\Models\Cart;
use App\Domain\Repositories\Contracts\FileInterface;

class FileService
{

	/**
	 * @var FileInterface
	 */
	private $file;

	public function __construct(FileInterface $file)
	{
		$this->file = $file;
	}

	/**
	 * You can handle events here, and manipulate the data as needed before
	 * passing it to the repo for processing :D
	 * 
	 * @return array
	 */
	public function handle($cartId, $filename, $size = null)
	{
		if(!$filename) {
			return $this->file->getByCartId($cartId);
		}

		$file =  $this->file->get($cartId, $filename);

		return array_merge($file, $size);

	}

}