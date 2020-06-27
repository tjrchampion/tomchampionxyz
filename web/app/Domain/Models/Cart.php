<?php

namespace App\Domain\Models;

use App\Domain\Models\File;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
	protected $table = 'cart';

	protected $fillable = [
		'udid',
		'title',
		'complete'
	];

	public function files()
	{
		return $this->hasMany(File::class, 'cart_id', 'id');
	}
}