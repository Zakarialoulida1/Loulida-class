<?php

namespace App\Policies;

use App\Models\CoursFile;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CoursFilePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, CoursFile $coursFile)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, CoursFile $coursFile)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, CoursFile $coursFile)
    {
        // Check if the user is the creator of the coursFile
        return $user->id === $coursFile->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, CoursFile $coursFile)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, CoursFile $coursFile)
    {
        //
    }
}
