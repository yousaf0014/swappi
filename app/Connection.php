<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Connection extends Model
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
	 * Get from that belongs to connection
	 */
	public function sender()
	{
		return $this->belongsTo(User::class, 'follower_id');
	}
	
	/**
	 * Get to that belongs to connection
	 */
	public function reciever()
	{
		return $this->belongsTo(User::class, 'user_id');
	}
}
