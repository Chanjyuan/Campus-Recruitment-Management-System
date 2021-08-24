<?php

namespace App\Policies;

use App\Employer;
use App\User;
use Auth;
use Illuminate\Auth\Access\HandlesAuthorization;

class CompanyProfilePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Employer  $employer
     * @return mixed
     */
    public function view(User $user, Employer $employer)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Employer  $employer
     * @return mixed
     */
    public function update(User $user, Employer $employer)
    {
        return Auth::guard('employer')->user()->id == $employer->id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Employer  $employer
     * @return mixed
     */
    public function delete(User $user, Employer $employer)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Employer  $employer
     * @return mixed
     */
    public function restore(User $user, Employer $employer)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Employer  $employer
     * @return mixed
     */
    public function forceDelete(User $user, Employer $employer)
    {
        //
    }
}
