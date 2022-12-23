<?php

namespace App;

use App\User;
use App\Ad;

use Illuminate\Database\Eloquent\Model;

class AdSwap extends Model
{
	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'ad_swap';

	/**
     * Disable model timestamp fields 
     * @var string
     */
    public $timestamps = false;

    /**
     * Get user that belongs to adswap
     */
    public function owner()
    {
    	return $this->belongsTo(User::class, 'ad_owner_id');
    }

    /**
     * Get user that belongs to adswap
     */
    public function swaper()
    {
    	return $this->belongsTo(User::class, 'ad_swaper_id');
    }

    /**
     * Get ad that belongs to adswap
     */
    public function ad()
    {
    	return $this->belongsTo(Ad::class);
    }
}
