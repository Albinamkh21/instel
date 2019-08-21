<?php

namespace Corp\Policies;

use Corp\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PermissionPolicy
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
    public function change(User $user){
        return $user->canDo('EDIT_ROLES');
    } public function create(User $user)
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
