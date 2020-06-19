<?php

namespace App\Domain\Services;

use App\Domain\Models\Cart;
use App\Domain\Repositories\Contracts\CartInterface;
use Valitron\Validator;

class CartStoreService
{

	/**
	 * @var CartInterface
	 */
	private $cart;

	public function __construct(CartInterface $cart, Validator $validator)
	{
		$this->cart = $cart;
		$this->validator = $validator;
	}

	/**
	 * You can handle events here, and manipulate the data as needed.
	 * @return array
	 */
	public function handle(array $body, array $files)
	{

		$validator = $this->validator->withData($data);

		$validator->mapFieldsRules(
			$this->rules()
		);

		if(!$validator->validate()) {

			return [
				'errors' => $validator->errors()
			];
		}

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