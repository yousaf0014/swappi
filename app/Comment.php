<?php

namespace App;

use App\User;
use App\Ad;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
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
     * Get user that belongs to comment
     */
    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    /**
     * Get ad that belongs to comment
     */
    public function ad()
    {
    	return $this->belongsTo(Ad::class);
    }
}
