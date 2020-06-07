<?php

namespace App\Domain\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
	protected $table = 'cart';

	protected $fillable = [
		'udid',
		'title',
		'is_complete'
	];
}