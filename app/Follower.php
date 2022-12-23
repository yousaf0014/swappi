<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Follower extends Model
{
	/**
	 * Get user that belongs to follower
	 */
	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
