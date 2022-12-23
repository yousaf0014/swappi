<?php

namespace App\Repositories;

use App\User;
use App\Connection;

class MessageRepository
{
    /**
     * Get all of the messages for a given user.
     *
     * @param  User  $user
     * @return Collection
     */
    public function forUser(User $user)
    {
        return $user->messages_reciever()
        	->orderBy('createdAt', 'DESC')
        	->get();
    }
    
    /**
     * Get all of the messages for a given user (group by).
     *
     * @param  User  $user
     * @return Collection
     */
    public function forUserGroupBy(User $user)
    {
    	return $user->messages_reciever()
    		->orderBy('messages.createdAt', 'DESC')
	    	->join('users', 'users.id', '=', 'messages.reciever_id')
	    	->where('messages.status', '1')
	    	->limit(1)
    		->get();
    }
    
    /**
     * Get all of the messages for a given user.
     *
     * @param  User  $user
     * @return Collection
     */
    public function fromUser(User $user)
    {
    	return $user->messages_sender()
	    	->orderBy('createdAt', 'DESC')
	    	->get();
    }
    
    public function messagesInConnection(User $user)
    {
    	return $user->messages_reciever()
// 	    	->join('connections', function($join){
// 	    		$join->on('user_id', '=', 'messages.reciever_id')
// 	    		->orOn('follower_id', '=', 'messages.reciever_id');
// 	    	})
	    	->where('messages.status', '1')
	    	->groupby('messages.sender_id')
	    	->orderby('messages.sender_id', 'DESC')
	    	->orderby('messages.id', 'DESC')
	    	->get();
    }
}