<?php

namespace Corp\Policies;

use Corp\User;
use Corp\Portfolio;
use Illuminate\Auth\Access\HandlesAuthorization;

class PortfolioPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    public function save(User $user){
        return $user->canDo('EDIT_PORTFOLIO');
    }
    public function edit(User $user){
        return $user->canDo('EDIT_PORTFOLIO');
    }
    public function destroy(User $user, Portfolio $portfolio){

        return ($user->canDo('EDIT_PORTFOLIO') && $user->id == $portfolio->userId);
    }

}
