<?php

namespace App\Domain\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
	protected $table = 'contacts';

	protected $fillable = [
		'email', 
		'name',
		'body'
	];

}