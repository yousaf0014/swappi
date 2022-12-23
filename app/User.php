<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Builder;

class User extends Authenticatable
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
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fName', 'lName','username', 'email', 'password', 'phone1', 'phone2', 'country', 'city', 'postCode', 'profileType', 'jobTitle', 'businessLine', 'businessLink', 'description', 'profilePic', 'coverPic','status','created_timestamp'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
        
    /**
     * Check loggedin user admin or not. 
     * @return unknown
     */
    public function isAdmin()
    {
    	return $this->role == 'admin' ? true : false ;
    }
    
    /**
     * The skills that belong to the user.
     */
    public function skills()
    {
        return $this->belongsToMany(Skill::class);
    }

    /**
     * The categories for the user.
     */
    public function categories()
    {
        return $this->hasMany(SkillUser::class);
    }

    /**
     * The ads for the user.
     */
    public function ads()
    {
        return $this->hasMany(Ad::class);
    }

    /**
     * The transactions for the user.
     */
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    /**
     * The messages sent for the user.
     */
    public function messages_sender()
    {
        return $this->hasMany(Message::class, 'sender_id', 'id');
    }

    /**
     * The messages recieved for the user.
     */
    public function messages_reciever()
    {
        return $this->hasMany(Message::class, 'reciever_id', 'id');
    }

    /**
     * The comments for the user.
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    
    /**
     * The certifications for the user.
     */
    public function certifications()
    {
    	return $this->hasMany(Certification::class);
    }
    
    /**
     * The projects for the user.
     */
    public function projects()
    {
    	return $this->hasMany(Project::class);
    }
    
    /**
     * The experiences for the user.
     */
    public function experiences()
    {
    	return $this->hasMany(Experience::class);
    }
    
    /**
     * The followers for the user.
     */
    public function followers()
    {
    	return $this->hasMany(Follower::class);
    }
    
    /**
     * The trainings for the user.
     */
    public function trainings()
    {
    	return $this->hasMany(Training::class);
    }
    
    /**
     * The reviews for the user.
     */
    public function reviews()
    {
    	return $this->hasMany(Review::class)->orderby('ratting');
    }
    
    /**
     * get favorite ads for the user.
     * @return unknown
     */
    public function favorite_ads(){
    	return $this->hasMany(AdFavorite::class);
    }
    
    ///////////////////////////////////////////////////////Friends functions
    // friendship that I started
    function friendsOfMine()
    {
    	return $this->belongsToMany(User::class, 'connections', 'follower_id', 'user_id')
    		->withPivot('status'); // or to fetch status value
	    	
    }
    
    // friendship that I was invited to
    function friendOf()
    {
    	return $this->belongsToMany(User::class, 'connections', 'user_id', 'follower_id')
    		->withPivot('status'); // or to fetch status value
    }
    
    // accessor allowing you call $user->friends
    public function getFriendsAttribute()
    {
    	if ( ! array_key_exists('friends', $this->relations)) $this->loadFriends();
    
    	return $this->getRelation('friends');
    }
    
    protected function loadFriends()
    {
    	if ( ! array_key_exists('friends', $this->relations))
    	{
    		$friends = $this->mergeFriends();
    
    		$this->setRelation('friends', $friends);
    	}
    }
    
    protected function mergeFriends()
    {
    	return $this->friendsOfMine->merge($this->friendOf);
    }
    //////////////////////////////////////////////////////
    
    //////////////////////////////////////////////////////Messeging functions
    // messages that I sent
    function messagesOfMine()
    {
    	return $this->belongsToMany(User::class, 'messages', 'sender_id', 'reciever_id')
    		->withPivot('status') // or to fetch status value
    		->withPivot('msgText')
    		->withPivot('isUnread')
    		->withPivot('createdAt')->orderBy('createdAt', 'DESC');
    
    }
    
    // messages that I was recieved
    function messagesOf()
    {
    	return $this->belongsToMany(User::class, 'messages', 'reciever_id', 'sender_id')
    		->withPivot('status') // or to fetch status value
    		->withPivot('msgText')
    		->withPivot('isUnread')
    		->withPivot('createdAt')->orderBy('createdAt', 'DESC');
    }
    
    // accessor allowing you call $user->messages
    public function getMessagesAttribute()
    {
    	if ( ! array_key_exists('messages', $this->relations)) $this->loadMessages();
    
    	return $this->getRelation('messages');
    }
    
    protected function loadMessages()
    {
    	if ( ! array_key_exists('messages', $this->relations))
    	{
    		$messages = $this->mergeMessages();
    
    		$this->setRelation('messages', $messages);
    	}
    }
    
    protected function mergeMessages()
    {
    	return $this->messagesOfMine->merge($this->messagesOf);
    }
    
    //////////////////////////////////////////////////////////////
}
