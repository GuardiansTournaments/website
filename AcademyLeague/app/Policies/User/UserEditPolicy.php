<?php

namespace App\Policies\User;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Enums\UserRoleEnum;

class UserEditPolicy
{
    use HandlesAuthorization;

    /**
     * Determine if the given post can be updated by the user.
     *
     * @param  \App\User  $user
     * @param  \App\User  $userEdit
     * @return bool
     */
    public function access(User $user, User $userEdit)
    {
        return $user->id === $userEdit->id || $user->role == UserRoleEnum::Admin;
    }
}
