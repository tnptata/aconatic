<?php

namespace App\Policies;

use App\Models\Claimlist;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ClaimlistPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Claimlist  $claimlist
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Claimlist $claimlist)
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->isAdmin() or $user->isRole('OFFICER');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Claimlist  $claimlist
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Claimlist $claimlist)
    {
        return $user->isAdmin() or $user->isRole('OFFICER');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Claimlist  $claimlist
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Claimlist $claimlist)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Claimlist  $claimlist
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Claimlist $claimlist)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Claimlist  $claimlist
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Claimlist $claimlist)
    {
        //
    }
}
