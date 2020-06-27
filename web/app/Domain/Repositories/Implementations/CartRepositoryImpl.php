<?php

namespace App\Domain\Repositories\Implementations;

use App\Domain\Models\Cart;
use App\Domain\Models\File;
use Slim\Psr7\UploadedFile;
use Psr\Http\Message\ResponseInterface as Response;
use App\Domain\Repositories\Contracts\CartInterface;

class CartRepositoryImpl implements CartInterface
{

	/**
     * return a list of cart items
	 * 
     * @param [type] $list
     * @return array
     */
    public function get() : array
    {

	    return Cart::get()->toArray();
    }

	/**
	 * Domain layer respository for getting a cart item by UDID
	 *
	 * @param [type] $id
	 * @return array
	 */
    public function getCartItemById($id) : array
    {
	    return Cart::with('files')->where('udid', $id)->get()->toArray();
    }

	/**
	 * Domain layer repo for storing a cart item.
	 *
	 * @param [type] $body
	 * @return array
	 */
    public function store($body, $files) : array
    {

		$cart =  Cart::create($body);

		if($files) {
			$cart->files()->createMany($files);
		}

		return $cart->toArray();


    }

	/**
	 * Domain layer repo for deleting a sepecific cart item
	 *
	 * @param [type] $data
	 * @return integer
	 */
	public function delete($data) : int
	{
		return Cart::where('udid', $data['udid'])->where('id', $data['id'])->delete();
	}

	/**
	 * Domain layer repo for updating a specific cart item
	 * 
	 * @param $data
	 * @return array
	 */
	public function update($data) : array
	{
		$updated =  Cart::where('udid', $data['udid'])
			->where('id', $data['id'])
			->update([
			'title' => $data['title'],
			'complete' => $data['complete']
		]);

		return Cart::where('udid', $data['udid'])
			->where('id', $data['id'])
			->first()
			->toArray();
	}
}