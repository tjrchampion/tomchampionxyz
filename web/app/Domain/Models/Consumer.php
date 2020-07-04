<?php

namespace App\Domain\Models;

use Illuminate\Database\Eloquent\Model;

class Consumer extends Model
{
	protected $table = 'consumers';

	protected $fillable = [
		'id',
		'token'
	];
}