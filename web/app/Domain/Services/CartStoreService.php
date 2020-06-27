<?php

namespace App\Domain\Services;

use Valitron\Validator;
use App\Domain\Models\Cart;
use App\Domain\Repositories\Contracts\CartInterface;
use App\Domain\Repositories\Contracts\FileInterface;

class CartStoreService
{

	/**
	 * @var CartInterface
	 */
	private $cart;

	/**
	 * @var FileInterface
	 */
	protected $file;

	public function __construct(CartInterface $cart, FileInterface $file, Validator $validator)
	{
		$this->cart = $cart;
		$this->file = $file;
		$this->validator = $validator;
	}

	/**
	 * You can handle events here, and manipulate the data as needed.
	 * @return array
	 */
	public function handle(array $body, array $files)
	{

		$validator = $this->validator->withData($body);

		$validator->mapFieldsRules(
			$this->rules()
		);

		if(!$validator->validate()) {

			return [
				'errors' => $validator->errors()
			];
		}
		
		$this->file->handle($files);
		$files = $this->file->getStored();
		
		return $this->cart->store($body, $files);
	}

	public function rules()
	{
		return [
			'title' => ['required'],
			'udid' => ['required']
		];
	}
}