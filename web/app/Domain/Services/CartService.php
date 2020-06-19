<?php

namespace App\Domain\Services;

use App\Domain\Models\Cart;
use App\Domain\Repositories\Contracts\CartInterface;

class CartService
{

	/**
	 * @var CartInterface
	 */
	private $cart;

	public function __construct(CartInterface $cart)
	{
		$this->cart = $cart;
	}

	/**
	 * You can handle events here, and manipulate the data as needed.
	 * @return array
	 */
	public function handle($udid)
	{
		return $this->cart->getCartItemById($udid);
	}

}