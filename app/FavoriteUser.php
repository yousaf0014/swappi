<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FavoriteUser extends Model
{
	
	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'favorite_users';
	
	/**
	 * The name of the "created at" column.
	 *
	 * @var string
	 */
	const CREATED_AT = 'createdAt';
}
