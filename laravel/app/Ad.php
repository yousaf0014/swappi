<?php

namespace App;

use App\User;
use App\Skill;
use App\AdSkill;
use App\Transaction;
use App\Comment;
use App\AdImage;
use App\AdFavorite;
use App\AdSwap;
use Illuminate\Database\Eloquent\Model;

class Ad extends Model
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
    ];
    
    /**
     * Get user that belongs to ad
     */
    public function user()
    {
    	return $this->belongsTo(User::class);
    }
    
    /**
     * The skills that belong to the ad.
     */
    public function skills()
    {
    	return $this->belongsToMany(Skill::class);
    }
    
    /**
     * The categories for the ad.
     */
    public function categories()
    {
    	return $this->hasMany(AdSkill::class);
    }

    /**
     * Get transactions for the ad
     */
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    /**
     * Get comments for the ad
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * Get ad images for the ad
     */
    public function adimages()
    {
        return $this->hasMany(AdImage::class);
    }
    
    /**
     * Get User favorites the ad
     * @return unknown
     */
    public function favorite_by_user(){
    	return $this->hasMany(AdFavorite::class);
    }

    /**
     * Get swaps for the ad
     */
    public function swaps()
    {
        return $this->hasMany(AdSwap::class);
    }

}
