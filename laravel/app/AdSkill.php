<?php

namespace App;

use App\Skill;
use App\Ad;
use App\Category;
use Illuminate\Database\Eloquent\Model;

class AdSkill extends Model
{
	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'ad_skill';
	
	/**
	 * Disable model timestamp fields 
	 * @var string
	 */
	public $timestamps = false;
	
	/**
	 * Get skills for the skill user.
	 */
	public function skills()
	{
		return $this->hasMany(Skill::class);
	}
	
	/**
	 * Get users for the skill user.
	 */
	public function ads()
	{
		return $this->hasMany(Ad::class);
	}
	
	/**
	 * Get users for the skill user.
	 */
	public function categories()
	{
		return $this->hasMany(Category::class);
	}
}
