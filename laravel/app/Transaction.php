<?php

namespace App;

use App\User;
use App\Ad;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
	public $timestamps = false;
	
    /**
     * Get user that belongs to transaction
     */
    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    /**
     * Get ad that belongs to transaction 
     */
    public function ad()
    {
    	return $this->belongsTo(Ad::class);
    }
}
