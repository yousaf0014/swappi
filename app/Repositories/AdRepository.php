<?php

namespace App\Repositories;

use App\User;

class AdRepository
{
    /**
     * Get all of the ads for a given user.
     *
     * @param  User  $user
     * @return Collection
     */
    public function forUser(User $user)
    {
        return $user->ads()
        	->orderBy('createdAt', 'DESC')
        	->get();
    }
}