<?php

namespace App\Domain\Repositories\Contracts;

interface CartInterface
{
	/**
	 * @return array
	 */
	public function get() : array;

	/**
	 * @param int $id
	 * @return array
	 */
	public function getCartItemById(int $id) : array;

	/**
	 * @param array $data
	 * @return array
	 */
	public function store(array $data) : array;

}