<?php

namespace App\Domain\Services;

use App\Domain\Models\Cart;
use App\Domain\Repositories\Contracts\CartInterface;
use Valitron\Validator;

class CartDeleteService
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
	public function handle(array $data)
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

		$deleted = $this->cart->delete($data);

		if($deleted) {
			return [
				'message' => 'Cart item has been removed'
			];
		}

		return [
			'errors' => [
				'message' => 'Could not delete cart item'
			]
		];

	}

	public function rules()
	{
		return [
			'id' => ['required'],
			'udid' => ['required']
		];
	}

}