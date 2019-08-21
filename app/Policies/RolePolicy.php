<?php

namespace Corp\Policies;

use Corp\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolePolicy
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
    public function create(User $user)
    {
        return $user->canDo('EDIT_ROLES');
    }

    public function edit(User $user)
    {
        return $user->canDo('EDIT_ROLES');
    }
    public function destroy(User $user){

        return ($user->canDo('EDIT_ROLES'));
    }
}
