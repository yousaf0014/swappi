<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
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
     * Get sender that belongs to message
     */
    public function sender()
    {
    	return $this->belongsTo(User::class, 'sender_id');
    }
    
    /**
     * Get reciever that belongs to message
     */
    public function reciever()
    {
    	return $this->belongsTo(User::class, 'reciever_id');
    }
}
