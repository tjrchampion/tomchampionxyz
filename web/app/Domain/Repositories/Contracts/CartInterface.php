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
	public function store(array $body, array $files) : array;


	public function handleFiles(array $files) : void;

	/**
	 * @param $data
	 * @return mixed
	 */
	public function delete($data) : int;

	/**
	 * @param $data
	 * @return array
	 */
	public function update($data) : array;

	

}