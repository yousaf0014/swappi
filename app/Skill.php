<?php

namespace App;

use App\Category;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
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
     * Get category that belongs to skill
     */
    public function category()
    {
    	return $this->belongsTo(Category::class);
    }

    /**
     * Get users that belong to the skill.
     */
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
