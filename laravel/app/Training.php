<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
	/**
	 * The name of the "created at" column.
	 *
	 * @var string
	 */
	const CREATED_AT = 'createdAt';
	
	/**
	 * The name of the "updated at" column.
	 *
	 * @var string
	 */
	const UPDATED_AT = 'updatedAt';
	
	/**
	 * The attributes that should be mutated to dates.
	 *
	 * @var array
	 */
	protected $dates = [
			'createdAt',
			'updatedAt',
			'startDate',
			'endDate'
	];
	
	/**
	 * Get user that belongs to training.
	 */
	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
