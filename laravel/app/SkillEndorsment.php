<?php

namespace App;

use App\Skill;
use App\User;
use Illuminate\Database\Eloquent\Model;

class SkillEndorsment extends Model
{
	/**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'skill_endorsments';

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
    public function fromUsers()
    {
    	return $this->hasMany(User::class,'id','from_user');
    }

    public function toUsers(){
        return $this->hasMany(User::class,'id','to_user');
    }
}
