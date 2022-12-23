<?php

namespace App;

use App\User;
use App\Category;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
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
	 * Get user that belongs to project
	 */
	public function user()
	{
		return $this->belongsTo(User::class);
	}
	
	/**
	 * Get category that belongs to project
	 */
	public function category()
	{
		return $this->belongsTo(Category::class);
	}
}
