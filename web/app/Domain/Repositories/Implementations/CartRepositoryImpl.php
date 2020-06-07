<?php

namespace App\Domain\Repositories\Implementations;

use App\Domain\Models\Cart;
use App\Domain\Repositories\Contracts\CartInterface;
use Psr\Http\Message\ResponseInterface as Response;


class CartRepositoryImpl implements CartInterface
{

	/**
     * return a list of cart items
	 *
	 *
     *
     * @param [type] $list
     * @return array
     */
    public function get() : array
    {

	    return Cart::get()->toArray();
    }

    public function getCartItemById($id) : array
    {
	    return Cart::where('udid', $id)->get()->toArray();
    }

    public function store(array $data) : array
    {
    	return Cart::create($data)->toArray();
    }


	public function delete($data) : int
	{
		return Cart::where('udid', $data['udid'])->where('id', $data['id'])->delete();
	}

	/**
	 * @param $data
	 * @return array
	 */
	public function update($data) : array
	{
		$updated =  Cart::where('udid', $data['udid'])
			->where('id', $data['id'])
			->update([
			'title' => $data['title'],
			'is_complete' => $data['is_complete']
		]);

		return Cart::where('udid', $data['udid'])
			->where('id', $data['id'])
			->first()
			->toArray();

	}
}