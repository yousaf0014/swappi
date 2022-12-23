<?php

namespace App;

use App\Skill;
use App\User;
use Illuminate\Database\Eloquent\Model;

class SkillUser extends Model
{
	/**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'skill_user';

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
    public function users()
    {
    	return $this->hasMany(User::class);
    }
}
