<?php

namespace App;

use App\Ad;
use App\User;
use Illuminate\Database\Eloquent\Model;

class AdFavorite extends Model
{
	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'ad_favorite';
	
	/**
	 * Get users for the skill user.
	 */
	public function ad()
	{
		return $this->hasOne(Ad::class, 'id', 'ad_id');
	}
	
	/**
	 * Get users for the skill user.
	 */
	public function user()
	{
		return $this->hasOne(User::class, 'id', 'user_id');
	}
}
