<?php

namespace Corp\Policies;

use Corp\User;
use Corp\Team;
use Illuminate\Auth\Access\HandlesAuthorization;

class TeamPolicy
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
        return $user->canDo('ADD_TEAM');
    }
    public function edit(User $user){
        return $user->canDo('EDIT_TEAM');
    }
    public function destroy(User $user, Team $team){

        return ($user->canDo('DELETE_TEAM'));
    }

}
