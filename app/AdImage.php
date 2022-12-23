<?php

namespace App;

use App\Ad;
use Illuminate\Database\Eloquent\Model;

class AdImage extends Model
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
     * Get ad that belongs to ad image
     */
    public function ad()
    {
    	return $this->belongsTo(Ad::class);
    }
}
