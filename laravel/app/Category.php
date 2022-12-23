<?php

namespace App;

use App\Skill;
use App\SkillUser;
use App\Ad;
use App\AdSkill;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
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
     * Get skills for the comment
     */
    public function skills()
    {
    	return $this->hasMany(Skill::class);
    }

    /**
     * The users for the category.
     */
    public function users()
    {
        return $this->hasMany(SkillUser::class);
    }
    
    /**
     * The ads for the category.
     */
    public function ads()
    {
    	return $this->hasMany(AdSkill::class);
    }

}
